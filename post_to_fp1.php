<?php
require_once __DIR__ . '/fb_config.php';
require_once __DIR__ . '/vendor/facebook/php-sdk-v4/src/Facebook/Facebook.php';

# login.php

define('FB_FANPAGE_ID', '850962965008426');


//$post_url = 'https://graph.facebook.com/'. FB_FANPAGE_ID . '/feed';


$data = [
  'source' => $fb->fileToUpload('https://images-na.ssl-images-amazon.com/images/I/51m%2BFFxEtAL._SY355_.jpg'),
];

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->post(FB_FANPAGE_ID . '/feed', $data, $_SESSION['facebook_access_token']);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$graphNode = $response->getGraphNode();

echo 'Photo ID: ' . $graphNode['id'];

?>
