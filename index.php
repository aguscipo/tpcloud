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
    <br> </br>
    <div id="form"> </div>
    <div id="signOut"> </div>

    <script>
      function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        var title_name =  $('<h1>Bienvenido '+ profile.getName() + '</h1>');
        $('#name').append(title_name);
        var img = $('<img id="dynamic">'); //Equivalent: $(document.createElement('img'))
        img.attr('src', profile.getImageUrl());
        img.appendTo('#imagediv');
        $( ".g-signin2" ).hide();
        var link =$('<a href="#" onclick="signOut();">Sign out</a>');
        link.appendTo('#signOut');
        var access_token = googleUser.getAuthResponse().access_token;
        var form = $('<form method="post" action="list_files.php">' +
                        '<input type="hidden" name="access_token" value='+ access_token +'>' +
                        '<input type="submit" value="Ver Mis Archivos de Google Drive">'+
                      '</form>'
                    );
        $('#form').append(form);
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
