
<?php
require_once __DIR__.'/vendor/autoload.php';
$client = new Google_Client();
$client->setAuthConfig('client_secrets.json');
$token= $_POST["idtoken"];
$access_token = $client->verifyIdToken($token);
//print_r($access_token);
$client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);

if (isset($access_token)){
  $client->setAccessToken($token);
  $drive_service = new Google_Service_Drive($client);
  $files_list = $drive_service->files->listFiles(array())->getFiles();
  echo ($files_list);
} else {
  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

?>
