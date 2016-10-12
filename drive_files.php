<?php
require_once __DIR__.'/vendor/autoload.php';
session_start();

$client = new Google_Client();
$client->setAuthConfig('client_secrets.json');
$client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  echo "LA CONCHA DE TU MADRE";
  $client->setAccessToken($_SESSION['access_token']);
  $drive_service = new Google_Service_Drive($client);
  $files_list = $drive_service->files->listFiles(array())->getFiles();
  echo json_encode($files_list);
  print_r($files_list);
}
else {
  echo "LA CONCHA DE TU ELSE HERMANA";
  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php';
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}
