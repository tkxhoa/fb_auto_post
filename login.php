<?php
require_once __DIR__ . '/fb_config.php';

# login.php

if (!session_id()) {
    session_start();
}

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes', 'public_profile', 'publish_actions']; // optional
$loginUrl = $helper->getLoginUrl('http://localhost/fanpage_auto_post/login-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';

?>
