<html lang="es">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="1009844009027-er6g2ovrcmgknsarrvvv81lo1qudscht.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  </head>
  <body>
    <a href="index.php" >Volver</a>
    <div style="visibility: hidden" class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    <div id="form_list"> </div>
    <div id="form_create"> </div>

    <script>
      function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        var access_token = googleUser.getAuthResponse().access_token;
        var form_list = $('<form method="post" action="list_files.php">' +
                            '<input type="hidden" name="access_token" value='+ access_token +'>' +
                            '<input type="submit" value="Listar archivos">'+
                          '</form>'
                          );
        var form_create = $('<form method="post" action="create_file.php">' +
                              '<input type="hidden" name="access_token" value='+ access_token +'>' +
                              '<input placeholder="Ingrese un nombre" type="text" name="name" required>'+
                              '<input type="submit" value="Crear archivo">'+
                            '</form>'
                            );
        $('#form_list').append(form_list);
        $('#form_create').append(form_create);

      };

    </script>



  </body>

</html>
