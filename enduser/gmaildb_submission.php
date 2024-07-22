<?php
session_start();
include '../userconfig.php';

$name = $_POST['name'];
$email = $_POST['email'];
$picture = $_POST['picture'];
$privilege = 'End-User';

$query = "SELECT * FROM bits_login WHERE email = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
}
else {
  $imageData = file_get_contents($picture);
  if ($imageData !== false) {
    $escapedImageData = mysqli_real_escape_string($conn, $imageData);

    $query1 = "INSERT INTO bits_login SET
        `image` = '$escapedImageData',
        `fullname`='$name',
        `username`='',
        `email`='$email',
        `department`='',
        `password`='',
        `privilege`='$privilege'
        ";
    $query_run1 = mysqli_query($conn, $query1);
  }
}
?>
