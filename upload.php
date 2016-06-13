<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';	
require_once __DIR__ . '/vendor/facebook/php-sdk-v4/src/Facebook/autoload.php';

use Facebook\FacebookRequest;
use Facebook\GraphObject;
use Facebook\FacebookRequestException;

if (!session_id()) {
    session_start();
}

if($_SESSION) {

  try {

    // Upload to a user's profile. The photo will be in the
    // first album in the profile. You can also upload to
    // a specific album by using /ALBUM_ID as the path     
    $response = (new FacebookRequest(
      $_SESSION, 'POST', '/me/photos', array(
      	'source' => new CURLFile('/home/khoatx1/baseketball.jpg', 'image/png'),
      	'message' => 'User provided message'
      )
    ))->execute()->getGraphObject();

    // If you're not using PHP 5.5 or later, change the file reference to:
    // 'source' => '@/path/to/file.name'

    echo "Posted with id: " . $response->getProperty('id');

  } catch(FacebookRequestException $e) {

    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();

  }   


  echo 'Done!';
  exit;

}

?>
