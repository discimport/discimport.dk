<?php
/**
 * Common operations for all pages
 *
 * @package Intraface_Shop_Frontend
 * @author  Lars Olesen <lars@legestue.net>
 * @version @package-version@
 */

require 'config.local.php';

if (!defined('PATH_INCLUDE')) {
    define('PATH_INCLUDE', get_include_path());
}

set_include_path(PATH_INCLUDE);

if (session_id() == '') {
    session_start();
}

$credentials = array(
    'private_key' => INTRAFACE_PRIVATE_KEY,
    'session_id' => md5(session_id())
);
?>