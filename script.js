function signIn() {
  let oauth2Endpoint = "https://accounts.google.com/o/oauth2/v2/auth";

  let form = document.createElement('form');
  form.setAttribute('method', 'GET');
  form.setAttribute('action', oauth2Endpoint);

  let params = {
    "client_id": "739698917346-f8s70dlloor2261ip9bdufhnv21q2bo2.apps.googleusercontent.com",
    "redirect_uri": "https://bergsticketing.com/enduser/home.php",
    "response_type": "code", // Use "code" instead of "token"
    "scope": "https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email",
    "include_granted_scopes": 'true',
    'state': 'pass-through-value',
    'access_type': 'offline' // Request offline access to obtain a refresh token
  };

  for (var p in params) {
    let input = document.createElement('input');
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', p);
    input.setAttribute('value', params[p]);
    form.appendChild(input);
  }

  document.body.appendChild(form);

  form.submit();
}
