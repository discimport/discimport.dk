<?php
require_once 'config.local.php';

set_include_path(INTRAFACEPUBLIC_SHOP_INCLUDE_PATH);

require_once 'k.php';
require_once 'Ilib/ClassLoader.php';

$application = new Frisbeebutik_Root();

$application->registry->registerConstructor('shop', create_function(
  '$className, $args, $registry',
  '$credentials["private_key"] = INTRAFACE_PRIVATE_KEY;
   $credentials["session_id"] = md5($registry->session->getSessionId());
   $client = new IntrafacePublic_Shop_Client_XMLRPC2($credentials, INTRAFACE_SHOP_ID, false);
   return new IntrafacePublic_Shop($client, $registry->get("cache"));
  '
));

$application->registry->registerConstructor('cache', create_function(
  '$className, $args, $registry',
  '
   $options = array(
       "cacheDir" => dirname(__FILE__) . "/",
       "lifeTime" => 3600
   );
   return new Cache_Lite($options);'
));

$application->registry->registerConstructor('newsletter', create_function(
  '$className, $args, $registry',
  '$credentials["private_key"] = INTRAFACE_PRIVATE_KEY;
   $credentials["session_id"] = md5($registry->session->getSessionId());
   return new IntrafacePublic_Newsletter_Client_XMLRPC($credentials, 25, false);
  '
));

$application->registry->registerConstructor('onlinepayment', create_function(
    '$className, $args, $registry',
    'return new IntrafacePublic_OnlinePayment(' .
    '    new IntrafacePublic_OnlinePayment_Client_XMLRPC(' .
    '        array("private_key" => INTRAFACE_PRIVATE_KEY, "session_id" => md5($registry->get("k_http_Session")->getSessionId())), ' .
    '        false' .
    '    ),' .
    '    $registry->get("cache")' .
    ');'
));

$application->registry->registerConstructor('onlinepayment:payment_html', create_function(
    '$className, $args, $registry',
    'return new Ilib_Payment_Html("Quickpay", $GLOBALS["onlinepayment_merchant"], $GLOBALS["onlinepayment_md5secret"], $registry->get("k_http_Session")->getSessionId());'
));



$application->dispatch();