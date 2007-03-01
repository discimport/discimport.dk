<?php
define('PATH_IHTML', PATH_ROOT . 'frisbeebutik_ihtml/'); # skal ikke bruges mere
define('PATH_CACHE', PATH_ROOT . 'cache/');
define('PATH_TEMPLATE', PATH_ROOT . 'frisbeebutik_template/');

define('DISCIMPORT_IP', '217.116.230.17');

define('INTRAFACE_PRIVATE_KEY', 'hyTdKpPVQNFFI2R4FjJSDV1HLegGA3SHrtD1y9DdMZBcShXniy5');

set_include_path(PATH_INCLUDE . PATH_SEPARATOR . PATH_INCLUDE . '3Party/PEAR/' . PATH_SEPARATOR . get_include_path());

?>