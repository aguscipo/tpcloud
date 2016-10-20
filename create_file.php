<?php
require_once __DIR__.'/vendor/autoload.php';
$client = new Google_Client();
$client->setAuthConfig('client_secrets.json');
$access_token = $_POST['access_token'];
if (isset($access_token)){
  $client->setAccessToken($access_token);
  $driveService = new Google_Service_Drive($client);
  $fileMetadata = new Google_Service_Drive_DriveFile(array(
  'name' =>  $_POST['name'],
  'mimeType' => 'application/vnd.google-apps.document'));
$content = file_get_contents('files/new-file-tpcloud.doc');
$file = $driveService->files->create($fileMetadata, array(
  'data' => $content,
  'mimeType' => 'text/plain',
  'uploadType' => 'multipart',
  'fields' => 'id'));?>
  <a href="google_drive_admin.php" >Volver</a>
  <br></br>
<?php
printf("Se creo correctamente el archivo: %s\n", $_POST['name']);
}?>
