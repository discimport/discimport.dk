<?php
$GLOBALS['path_include'] =
    '../' . PATH_SEPARATOR .
    get_include_path();
$GLOBALS['intraface_private_key'] = '';
$GLOBALS['intraface_shop_id'] = 0;
$GLOBALS["onlinepayment_merchant"] = '';
$GLOBALS["onlinepayment_md5secret"] = '';
$GLOBALS["error_log"] = realpath('../errorlog/error.log');

set_include_path($GLOBALS['path_include']);

