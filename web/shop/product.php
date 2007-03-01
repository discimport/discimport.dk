<?php
/**
 * Vise alle billeder fra produktet
 *
 */

if (empty($_GET['id']) OR !is_numeric($_GET['id'])) {
	header('HTTP/1.1 404 Not Found');
	exit;
}

require 'include_webshop.php';
require 'Savant3.php';
require 'XML/RPC2/Client.php';

$options = array(
    'prefix' => 'products.'
);

$client = XML_RPC2_Client::create('http://www.intraface.dk/xmlrpc/webshop/server2.php', $options);


$product = $client->getProduct($credentials, (int)$_GET['id']);

$product_tpl = new Savant3();
$product_tpl->addPath('template', PATH_TEMPLATE);
$product_tpl->assign('product', $product);
$product_tpl->assign('client', $client);
$product_tpl->assign('related_products', $client->getRelatedProducts($credentials, (int)$_GET['id']));

$main = new Savant3();
$main->addPath('template', PATH_TEMPLATE);
$main->assign('title', $product['name']);
$main->assign('description', $product['description']);
$main->assign('keywords', '');
$main->assign('content_main', $product_tpl->fetch('product-tpl.php'));

echo $main->fetch('main-tpl.php');
?>