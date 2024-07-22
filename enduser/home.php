<?php
session_start();
include '../userconfig.php';

$privilege = 'End-User';

// Check if the authorization code is received
if (isset($_GET['code'])) {
    // Received authorization code from Google, exchange it for an access token
    $code = $_GET['code'];

    // Use environment variables for sensitive information
    $clientId = getenv('GOOGLE_CLIENT_ID');
    $clientSecret = getenv('GOOGLE_CLIENT_SECRET');
    $redirectUri = "https://yourdomain.com/enduser/home.php"; // Replace with your actual redirect URI

    $tokenEndpoint = "https://oauth2.googleapis.com/token";
    $params = [
        "code" => $code,
        "client_id" => $clientId,
        "client_secret" => $clientSecret,
        "redirect_uri" => $redirectUri,
        "grant_type" => "authorization_code"
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $tokenEndpoint);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    if (isset($data['access_token'])) {
        // Access token obtained, now get user information using the access token
        $accessToken = $data['access_token'];

        $userInfoEndpoint = "https://www.googleapis.com/oauth2/v1/userinfo?access_token=" . $accessToken;
        $userResponse = file_get_contents($userInfoEndpoint);
        $userData = json_decode($userResponse, true);

        if (isset($userData['email'])) {
            $email = $userData['email'];
            $fullName = $userData['name'] ?? '';
            $profilePictureUrl = $userData['picture'] ?? '';

            // Check if the email already exists in your database
            $query = "SELECT * FROM bits_login WHERE email = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 's', $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                // Email exists, redirect to dashboard
                $_SESSION['fullName'] = $fullName;
                $_SESSION['profilephoto'] = $profilePictureUrl;
                $_SESSION['email'] = $email;
                $_SESSION['privilege'] = $privilege;
                $_SESSION["loggedinasuser"] = true;
                header('Location: dashboard.php');
                exit();
            } else {
                // Email does not exist, insert the user into the database
                $imageData = $profilePictureUrl ? file_get_contents($profilePictureUrl) : '';
                $escapedImageData = mysqli_real_escape_string($conn, $imageData);

                $query1 = "INSERT INTO bits_login (image, fullname, username, email, department, password, privilege) VALUES (?, ?, '', ?, '', '', ?)";
                $stmt1 = mysqli_prepare($conn, $query1);
                mysqli_stmt_bind_param($stmt1, 'ssss', $escapedImageData, $fullName, $email, $privilege);
                $query_run1 = mysqli_stmt_execute($stmt1);

                if ($query_run1) {
                    $_SESSION['fullName'] = $fullName;
                    $_SESSION['profilephoto'] = $profilePictureUrl;
                    $_SESSION['email'] = $email;
                    $_SESSION['privilege'] = $privilege;
                    $_SESSION["loggedinasuser"] = true;
                    header('Location: dashboard.php');
                    exit();
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            }
        }
    }
}
?>
