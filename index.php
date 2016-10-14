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
    <div id="signOut"> </div>
    <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
      //  document.getElementById("name").innerText = "Bienvenido " + profile.getName();
        $('#name').text("Bienvenido " + profile.getName());
        var img = $('<img id="dynamic">'); //Equivalent: $(document.createElement('img'))
        img.attr('src', profile.getImageUrl());
        img.appendTo('#imagediv');
        $( ".g-signin2" ).hide();
        var link =$('<a href="#" onclick="signOut();">Sign out</a>');
        link.appendTo('#signOut');
        var access_token = googleUser.getAuthResponse().access_token;
        console.log(access_token);
      //  var id_token = googleUser.getAuthResponse().id_token;
      //  console.log("ID TOKEN " + id_token);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'http://tpcloud.com/prueba.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
          console.log('Signed in as: ' + xhr.responseText);
        };
      //  xhr.send('idtoken=' + id_token);
      xhr.send('accesstoken=' + access_token);

      };

    </script>
    <script>

          function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            var logueado= auth2.isSignedIn.get();
            console.log("Deberia ser true " + logueado)
            auth2.signOut();
            var logueado= auth2.isSignedIn.get();
            location.reload();
          }
  </script>


  </body>
</html>
