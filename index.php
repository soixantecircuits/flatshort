<?php

require(__DIR__ . '/config.php');

if (preg_match('#'.$service_URI.'\/(\/w*)/#i', $_SERVER['REDIRECT_URL'], $file)) {
  header("Status: 200 OK", false, 200);

  require(__DIR__ . '/shorts/' . $file . '.php');
} else {
  echo 'Sorry, an error occured.';
}
