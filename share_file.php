<?php
require_once __DIR__.'/vendor/autoload.php';
$client = new Google_Client();
$client->setAuthConfig('client_secrets.json');
$access_token = $_POST['access_token'];
if (isset($access_token)){
  $client->setAccessToken($access_token);
  $driveService = new Google_Service_Drive($client);
  $fileId = $_POST['file_id'];
  $driveService->getClient()->setUseBatch(true);
  try {
    $batch = $driveService->createBatch();
    $userPermission = new Google_Service_Drive_Permission(array(
      'type' => 'user',
      'role' => 'reader',
      'emailAddress' => $_POST['email']
    ));
    $request = $driveService->permissions->create(
      $fileId, $userPermission, array('fields' => 'id'));
    $batch->add($request, 'user');
    $domainPermission = new Google_Service_Drive_Permission(array(
      'type' => 'domain',
      'role' => 'reader',
      'domain' => 'gmail.com'
    ));
    $request = $driveService->permissions->create(
      $fileId, $domainPermission, array('fields' => 'id'));
    $batch->add($request, 'domain');
    $results = $batch->execute();

    foreach ($results as $result) {
      if ($result instanceof Google_Service_Exception) {
        // Handle error
        printf($result);
      } else {
        printf("Permission ID: %s\n", $result->id);
      }
    }
  } finally {
    $driveService->getClient()->setUseBatch(false);
  }
}
?>
