<html lang="es">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="1009844009027-85kivvsggdlcja37umpgige7djrvc4us.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  </head>
  <body>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    <div id="name"> </div>
    <div id="imagediv"> </div>
    <img id="my_image" src="first.jpg"/>
    <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
      //  document.getElementById("name").innerText = "Bienvenido " + profile.getName();
        $('#name').text("Bienvenido " + profile.getName());
        var img = $('<img id="dynamic">'); //Equivalent: $(document.createElement('img'))
        img.attr('src', profile.getImageUrl());
        img.appendTo('#imagediv');

        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());
      };
    </script>
  </body>
</html>
