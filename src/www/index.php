<?php
require_once 'config.local.php';

set_include_path($GLOBALS['path_include']);

require_once 'k.php';
require_once 'Ilib/ClassLoader.php';

$application = new Frisbeebutik_Root();
/*
$application->registry->registerConstructor('shop', create_function(
  '$className, $args, $registry',
  '$credentials["private_key"] = $GLOBALS["intraface_private_key"];
   $credentials["session_id"] = md5($registry->session->getSessionId());
   $debug = false;
   $client = new IntrafacePublic_Shop_Client_XMLRPC2($credentials, $GLOBALS["intraface_shop_id"], $debug);
   return new IntrafacePublic_Shop($client, $registry->get("cache"));
  '
));
*/
$application->registry->registerConstructor('shop', create_function(
  '$className, $args, $registry',
  '$credentials["private_key"] = $GLOBALS["intraface_private_key"];
   $credentials["session_id"] = md5($registry->session->getSessionId());
   $shop_id = $GLOBALS["intraface_shop_id"];
   $debug = false;
   $client = new IntrafacePublic_Shop_Client_XMLRPC($credentials, $shop_id, $debug, "http://discimportsession:hyTdKpPVQNFFI2R4FjJSDV1HLegGA3SHrtD1y9DdMZBcShXniy5@intraface.dk/webservice/xmlrpc/shop");
   return new IntrafacePublic_Shop($client, $registry->get("cache"));
  '
));

$application->registry->registerConstructor('cms', create_function(
  '$className, $args, $registry',
  '$credentials["private_key"] = $GLOBALS["intraface_private_key"];
   $credentials["session_id"] = md5($registry->session->getSessionId());
   $cms_id = 37;
   $client = new IntrafacePublic_CMS_Client_XMLRPC($credentials, $cms_id, false);
   return new IntrafacePublic_CMS($client, $registry->get("cache"));
  '
));

$application->registry->registerConstructor('cache', create_function(
  '$className, $args, $registry',
  '
   $options = array(
       "cacheDir" => $GLOBALS["cache_dir"],
       "lifeTime" => 3600
   );
   return new Cache_Lite($options);'
));

$application->registry->registerConstructor('newsletter', create_function(
  '$className, $args, $registry',
  '$credentials["private_key"] = $GLOBALS["intraface_private_key"];
   $credentials["session_id"] = md5($registry->session->getSessionId());
   return new IntrafacePublic_Newsletter_Client_XMLRPC($credentials, 25, false);
  '
));

$application->registry->registerConstructor('onlinepayment', create_function(
    '$className, $args, $registry',
    'return new IntrafacePublic_OnlinePayment(' .
    '    new IntrafacePublic_OnlinePayment_Client_XMLRPC(' .
    '        array("private_key" => $GLOBALS["intraface_private_key"], "session_id" => md5($registry->get("k_http_Session")->getSessionId())), ' .
    '        false' .
    '    ),' .
    '    $registry->get("cache")' .
    ');'
));

$application->registry->registerConstructor('onlinepayment:authorize', create_function(
    '$className, $args, $registry',
    'return new Ilib_Payment_Authorize_Provider_Quickpay($GLOBALS["onlinepayment_merchant"], $GLOBALS["onlinepayment_md5secret"]);'
));

try {
    $application->dispatch();
} catch (Exception $e) {
    echo $e->getMessage();
    $errorhandler = new ErrorHandler;
    $errorhandler->addObserver(new ErrorHandler_Observer_File($GLOBALS["error_log"]));
    $errorhandler->handleException($e);

}