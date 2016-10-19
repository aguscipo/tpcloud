<?php
require_once __DIR__.'/vendor/autoload.php';
$client = new Google_Client();
$client->setAuthConfig('client_secrets.json');
$access_token = $_POST['access_token'];
//$client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);
if (isset($access_token)){
  $client->setAccessToken($access_token);
  $drive_service = new Google_Service_Drive($client);
  $files_list = $drive_service->files->listFiles(array())->getFiles(); ?>
  <table id='files-table'>
    <tr>
      <td> Nombre del archivo </td>
      <td> Compartir </td>
    </tr>
    <?php foreach ($files_list as $file) { ?>
      <tr>
        <td> <a href="https://docs.google.com/document/d/<?php echo($file->getId());?>/export?format=doc"> <?php echo($file->getName()); ?> </a> </td>
        <td>
          <form method="post" action="share_file.php">
            <input type="hidden" name="access_token" value="<?php echo($access_token) ?>">
            <input type="hidden" name="file_id" value="<?php echo($file->getId()); ?>">
            <input value="Compartir archivo" type="submit">
          </form>
        </td>
     </tr>

    <?php } ?>
  </table>
<?php } ?>
