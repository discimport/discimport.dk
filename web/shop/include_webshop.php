<?php
/**
 * Common operations for all pages
 *
 * @package Intraface Webshop
 * @author  Lars Olesen <lars@legestue.net>
 * @since   0.1.0
 * @version @package-version@
 */

require 'Config.php';
require 'config.local.php';

$config = new Config();
$root = $config->parseConfig('config.local.php', 'phpconstants', array('name' => 'config'));
$settings = $root->toArray();

ob_start('ob_gzhandler');

if (session_id() == '') {
	session_start();
}

$credentials = array('private_key' => INTRAFACE_PRIVATE_KEY, 'session_id' => md5(session_id()));

?>