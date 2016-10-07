<!doctype html>

<html lang="es">
<head>
  <meta charset="utf-8">

  <title>DSSD Cloud</title>
  <meta name="google-signin-client_id" content="1009844009027-85kivvsggdlcja37umpgige7djrvc4us.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
<!--  <link rel="stylesheet" href="css/styles.css?v=1.0">-->
</head>

<body>

  <div class="g-signin2" data-onsuccess="onSignIn"></div>
  <a href="" onclick="signOut();">Sign out</a>


  <script>
    function onSignIn(googleUser) {
      console.log ("HOLAAAAAAAAAAA");
      var profile = googleUser.getBasicProfile();
      console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
      console.log('Name: ' + profile.getName());
      console.log('Image URL: ' + profile.getImageUrl());
      console.log('Email: ' + profile.getEmail());
    }

    function signOut() {
      var auth2 = gapi.auth2.getAuthInstance();
      auth2.signOut().then(function () {
        console.log('User signed out.');
      });
    }
  </script>
</body>
</html>
