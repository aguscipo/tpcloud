<html lang="es">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="1009844009027-er6g2ovrcmgknsarrvvv81lo1qudscht.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript">
        init = function() {
            s = new gapi.drive.share.ShareClient();
            s.setOAuthToken( '<?php echo($_POST['access_token'])?>');
            s.setItemIds(['<?php echo($_POST['file_id'])?>']);
        }
        window.onload = function() {
            gapi.load('drive-share', init);
        }
    </script>
  </head>
  <body>
    <button onclick="s.showSettingsDialog()"> Seleccionar Usuario Google</button>
  </body>
</html>
