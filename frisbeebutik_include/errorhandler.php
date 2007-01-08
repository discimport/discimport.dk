<?php
/**
 * ErrorHandler
 *
 * Funktionen håndterer fejl. Kaldes med
 * set_error_handler("errorHandler"); Parameterne sættes 
 * automatisk med den funktion, hvis siden render på fejl. Når
 * man har sat sin error handler rapporteres ingen fejl, så du bør
 * sikkert udvikle siden uden at have sat fejlhåndteringen til.
 *
 * @param $errno
 * @param $errmsg
 * @param $filename
 * @param $linenum
 * @param $vars  
 * 
 * @author Sune Jensen <sj@sunet.dk>
 * @author Lars Olesen <lars@legestue.net>
 */ 

define('SHOW_DEBUG', 1);

function errorHandler($errno, $errmsg, $filename, $linenum, $vars) {

  // timestamp for the error entry
  $dt = date("Y-m-d H:i:s (T)");

  // define an assoc array of error string
  // in reality the only entries we should
  // consider are E_WARNING, E_NOTICE, E_USER_ERROR,
  // E_USER_WARNING and E_USER_NOTICE

	$errortype = array (
		E_ERROR				=> "Fatal Error",
		E_WARNING			=> "Error",
		E_PARSE				=> "Parsing Error",
		E_NOTICE				=> "Warning",
		E_CORE_ERROR		=> "Fatal Core Error",
		E_CORE_WARNING		=> "Core Error",
		E_COMPILE_ERROR	=> "Fatal Compile Error",
		E_COMPILE_WARNING	=> "Compile Error",
		E_USER_ERROR		=> "Fatal User Error",
		E_USER_WARNING		=> "User Error",
		E_USER_NOTICE		=> "User Warning",
		// E_STRICT			=> "Runtime Notice"
		);

	$do_not_kill_script = array(E_NOTICE, E_WARNING);
		
  	if(in_array($errno, $do_not_kill_script)) {
      return;
    }
		if (SHOW_DEBUG) {
			die("<html><body><p><b>".$errortype[$errno].": </b>".$errmsg." in <b>".$filename."</b> on line <b>".$linenum."</b><br /><b>Discimport.dk</b></p></body></html>");
		}
		else {
			header("Location: /error/error.php?msg=".urlencode($errmsg));
			exit;
		}
}


?>