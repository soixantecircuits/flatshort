<?php
use Crisu83\ShortId\ShortId;

require(__DIR__ . '/./vendor/autoload.php');
require(__DIR__ . '/./config.php');
$shortid = ShortId::create();

if(isset ( $_GET['shortid'] ) ){
  $short_id = $_GET['shortid'];
} else {
  $short_id = $shortid->generate();
}

if(isset ( $_GET['uri'] ) && !empty($_GET['uri']) || isset($uri) ){
  $uri = (isset($uri)) ? $uri : $_GET['uri'];

  $short_path = $short_base_path . $short_id . '.php';
  if(file_exists($short_path)){
    header('Bad Request', true, 403);
    header('Content-Type: application/json');
    echo json_encode(array('error'=> 'this shorts is already taken.'));
  } else {
    $shorts = fopen($short_path, "w") or die("Unable to open file!");
    $file_content = '<?php header("Location: ' . $redirect_URI .$uri.'");?>';
    fwrite($shorts, $file_content);
    fclose($shorts);
    header('HTTP/1.1 200 OK');
    header('Content-Type: application/json');
    echo json_encode(array('short'=> $short_id));
    die();
  }
} else {
  header('Bad Request', true, 400);
  header('Content-Type: application/json');
  echo json_encode(array('error'=> 'no uri parameter specified.'));
}