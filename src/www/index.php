<?php
require_once 'config.local.php';

set_include_path(INTRAFACEPUBLIC_SHOP_INCLUDE_PATH);

require_once 'k.php';

$application = new Frisbeebutik_Root();

$application->registry->registerConstructor('shop', create_function(
  '$className, $args, $registry',
  'return new IntrafacePublic_Shop_XMLRPC_Client(array("private_key" => INTRAFACE_PRIVATE_KEY, "session_id" => md5($registry->SESSION->getSessionId())), false);'
));

$application->registry->registerConstructor('cache', create_function(
  '$className, $args, $registry',
  '
   $options = array(
       "cacheDir" => "",
       "lifeTime" => 3600
   );
   return new Cache_Lite($options);'
));


$application->dispatch();