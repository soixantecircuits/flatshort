<?php
use Crisu83\ShortId\ShortId;

require(__DIR__ . '/./vendor/autoload.php');
require(__DIR__ . '/./config.php');
$shortid = ShortId::create();

if ( isset($_GET['id']) ) {
    $id = $_GET['id'];
} else if( !isset($id) ) {
  header('HTTP/1.1 503 OK');
  header('Content-Type: application/json');
  echo json_encode(array('error'=> "No id specify"));
  die();
}

if(isset ( $_GET['shortid'] ) ){
  $short_id = $_GET['shortid'];
} else {
  $short_id = $shortid->generate();
}
$myfile = fopen('./shorts/' . $short_id . ".php", "w") or die("Unable to open file!");
$txt = '<?php header("Location: ' .$redirect_URI.$id.'");?>';
fwrite($myfile, $txt);
fclose($myfile);
header('HTTP/1.1 200 OK');
header('Content-Type: application/json');
echo json_encode(array('short'=> $short_id));
die();