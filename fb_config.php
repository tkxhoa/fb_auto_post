<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';	
require_once __DIR__ . '/vendor/facebook/php-sdk-v4/src/Facebook/autoload.php';

if (!session_id()) {
    session_start();
}

$fb = new Facebook\Facebook([
  'app_id' => '1060413660700000',
  'app_secret' => '9c0e49e9b06f762ec73c9d12ced57f84',
  'default_graph_version' => 'v2.5',
  'persistent_data_handler'=>'session'
]);


?>
