<?php
/**
 * Post Install
 *
 * @package Webshop
 * @author  Lars Olesen
 * @since   0.1.0
 * @version @package-version@
 */

class Webshop_Setup_PostInstall {

	function init($config, $pkg, $lastversion) {}
	function postProcessPrompts($promts, $section) {}
	function run($answers, $phase) {
		switch ($phase) {
			case 'setup': {
				return $this->_doSetup($answers);

			}

		}
	}
	function _doSetup($answers) {}
}

?>