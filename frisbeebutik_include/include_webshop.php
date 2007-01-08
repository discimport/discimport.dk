<?php
ob_start('ob_gzhandler');
/*
function getmicrotime() {
  list($usec, $sec) = explode(" ",microtime());
   return ((float)$usec + (float)$sec);
}

$time = getmicrotime();
*/
require('errorhandler.php');
require('settings.php');

require('3Party/IXR/IXR.php');
require('3Party/Template/Template.php');

require('webshop/WebshopClient.php');

//require('Page.php'); // skal jeg formentlig ikke bruge
//require('functions.php'); // skal jeg formentlig ikke bruge

set_error_handler('errorhandler');

?>