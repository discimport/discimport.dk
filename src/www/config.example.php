<?php
error_reporting(E_ALL &~E_DEPRECATED);

$GLOBALS['path_include'] =
    '../' . PATH_SEPARATOR .
    get_include_path();
$GLOBALS['intraface_private_key'] = '';
$GLOBALS['intraface_shop_id'] = 0;
$GLOBALS["onlinepayment_merchant"] = '';
$GLOBALS["onlinepayment_md5secret"] = '';
$GLOBALS["error_log"] = realpath('../errorlog/error.log');
$GLOBALS["cache_dir"] = realpath(dirname(__FILE__));

set_include_path($GLOBALS['path_include']);

