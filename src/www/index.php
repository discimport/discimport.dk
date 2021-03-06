<?php
require_once 'config.local.php';
require_once 'k.php';
require_once 'Ilib/ClassLoader.php';
require_once 'MCAPI.class.php';

$application = new Frisbeebutik_Root();

$application->registry->registerConstructor('shop', create_function(
  '$className, $args, $registry',
  '$credentials["private_key"] = $GLOBALS["intraface_private_key"];
   $credentials["session_id"] = md5($registry->session->getSessionId());
   $shop_id = $GLOBALS["intraface_shop_id"];
   $debug = false;
   $client = new IntrafacePublic_Shop_Client_XMLRPC($credentials, $shop_id, $debug, "http://".md5($registry->session->getSessionId()).":'.$GLOBALS['intraface_private_key'].'@intraface.dk/webservice/xmlrpc/shop");
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
  '$mailchimp = new MCAPI($GLOBALS["mailchimp_key"]); 
   return new Frisbeebutik_Newsletter($mailchimp, $GLOBALS["mailchimp_list_id"]);'
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
