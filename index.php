<?php
header("Content-Type: text/html; charset=utf-8");
require_once ('./includes/initialize.php');

function __autoload($class_name) {

  if ($class_name != 'DbSimple_Mysqli' && $class_name != 'Smarty') {
	require_once CLASS_PATH . '/class.' . $class_name . '.php';
  }
}

if (request_is_post()) {
  
  if ( isset($_POST['cancel'] )) {
	redirect_to('index.php');
  }
  
  $ad = new Ad(AdsStorage::sanitizeFormData($_POST));
  $ad->save();
  redirect_to('index.php');
}


$edit_id = '';
if (isset($_GET['id']) && isset($_GET['mode'])) {

  $id = (int) $_GET['id'];
  $mode = strip_tags($_GET['mode']);

  if ($mode == "show") {
	  $edit_id = $id;
  } elseif ($mode == "delete") {
	  Ad::delete($id);
	  exit(); //AJAX. Output isn't needed
  }
}

//could be chained methods -> -> ->
$storage = AdsStorage::getInstance();
$storage->fillStorage();
$storage->prepareFieldsOfAd($edit_id);
$storage->prepareTableOfAds();
$storage->display();