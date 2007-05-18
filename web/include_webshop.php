<?php
/**
 * Common operations for all pages
 *
 * @package Intraface Webshop
 * @author  Lars Olesen <lars@legestue.net>
 * @since   0.1.0
 * @version @package-version@
 */

error_reporting(E_ALL);

require 'config.local.php';

if (session_id() == '') {
    session_start();
}

$credentials = array(
    'private_key' => INTRAFACE_PRIVATE_KEY,
    'session_id' => md5(session_id())
);
?>