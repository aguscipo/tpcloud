
<?php
require_once __DIR__.'/vendor/autoload.php';
$client = new Google_Client();
$client->setAuthConfig('client_secrets.json');

$token= $_POST["idtoken"];
$ticket = $client->verifyIdToken($token);
print_r($ticket);

?>
