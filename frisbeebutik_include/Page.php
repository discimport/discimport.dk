<?php

class Page {

	function Page() {
  }
  
  function start($title = 'Discimport.dk', $meta = array('description'=>'','keywords'=>'')) {
  	if ($_SERVER['REMOTE_ADDR'] != DISCIMPORT_IP) {
	  	$title = $title;
  	 $meta = $meta;
  		include(PATH_IHTML . 'top.php');
    }
  }

  function end() {
  	if ($_SERVER['REMOTE_ADDR'] != DISCIMPORT_IP) {
	  	include(PATH_IHTML . 'bottom.php');
    }
  }
  
  
}

?>