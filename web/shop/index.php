<?php
/**
 * Products
 *
 * @package Intraface Webshop
 * @author	Lars Olesen <lars@legestue.net>
 * @since   0.1.0
 * @version 0.1.0
 */

require 'include_webshop.php';
require 'XML/RPC2/Client.php';
require 'Savant3.php';

$options = array(
    'prefix' => 'products.'
);

$client = XML_RPC2_Client::create('http://www.intraface.dk/xmlrpc/webshop/server2.php', $options);

/*
try {
    $result = $client->getList($credentials, '');
    print_r($result);
}
catch (XML_RPC2_FaultException $e) {
	die('Exception #' . $e->getFaultString());
}
catch (Exception $e) {
	die('Exception : ' . $e->getMessage());
}
*/

$html = '';

$list = new Savant3();
$list->setPath('template', PATH_TEMPLATE);

#
# NYHEDER
#
$search['keywords'] = array(265);
$products = $client->getList($credentials, $search);

# henter produkterne
$products = $products['products'];

if (count($products) > 0) {
	# viser produkterne
	$list->assign('headline', 'Nyheder');
	$list->assign('products', $products);
	$list->assign('no_results_msg', $err_msg);
	$html .= $list->fetch('products-feature-tpl.php');
}

#
# TILBUD
#

$search['keywords'] = array(266);
$products = $client->getList($credentials, $search);

# henter produkterne
$products = $products['products'];

if (count($products) > 0) {
	# viser produkterne
	$list->assign('headline', 'Tilbud');
	$list->assign('products', $products);
	$list->assign('no_results_msg', $err_msg);
	$html .= $list->fetch('products-feature-tpl.php');
}


# viser html på frisbeebutik.dk
$tpl = new Savant3();
$tpl->setEscape('htmlspecialchars');
$tpl->addPath('template', PATH_TEMPLATE);

$tpl->assign('title', 'Discimports butik');
$tpl->assign('description', '');
$tpl->assign('keywords', '');
$tpl->assign('content_main', '<h1>Nyheder og tilbud</h1>' . $html);

$tpl->display('main-tpl.php');

?>