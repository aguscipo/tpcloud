<html lang="es">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="1009844009027-er6g2ovrcmgknsarrvvv81lo1qudscht.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  </head>
  <body>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    <div id="name"> </div>
    <div id="imagediv"> </div>
    </br>
    <div id="form_list"> </div>
    <div id="form_create"> </div>
    <div id="signOut"> </div>

    <script>
      function onSignIn(googleUser) {
        var options = new gapi.auth2.SigninOptionsBuilder(
        {'scope': 'email https://www.googleapis.com/auth/drive https://www.googleapis.com/auth/drive.appfolder https://www.googleapis.com/auth/drive.file'});

        googleUser.grant(options).then(
        function(success){
          console.log(JSON.stringify({message: "success", value: success}));
        },
        function(fail){
          alert(JSON.stringify({message: "fail", value: fail}));
        });

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
        var form_list = $('<form method="post" action="list_files.php">' +
                            '<input type="hidden" name="access_token" value='+ access_token +'>' +
                            '<input type="submit" value="Ver Mis Archivos de Google Drive">'+
                          '</form>'
                          );
        var form_create = $('<form method="post" action="create_file.php">' +
                              '<input type="hidden" name="access_token" value='+ access_token +'>' +
                              '<input type="text" name="name">'+

                              '<input type="submit" value="Crear archivo">'+
                            '</form>'
                            );

        $('#form_list').append(form_list);
        $('#form_create').append(form_create);
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
