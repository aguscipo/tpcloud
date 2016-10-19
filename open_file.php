<?php
require_once __DIR__.'/vendor/autoload.php';
$client = new Google_Client();
$client->setAuthConfig('client_secrets.json');
//$client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);
$fileId = $_POST['file_id'];
$access_token = $_POST['access_token'];
$client->setAccessToken($access_token);
$driveService = new Google_Service_Drive($client);
$content = $driveService->files->export($fileId, 'application/pdf', array(
  'alt' => 'media' ));

?>
