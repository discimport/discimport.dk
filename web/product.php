<?php
/**
 * Vise alle billeder fra produktet
 *
 */

if (empty($_GET['id']) OR !is_numeric($_GET['id'])) {
    header('HTTP/1.1 404 Not Found');
    exit;
}

$id = intval($_GET['id']);

require 'include_shop.php';
require 'Frisbeebutik/Frontend.php';
require 'IntrafacePublic/Shop/XMLRPC/Client.php';

$debug = true;
$client = new IntrafacePublic_Shop_XMLRPC_Client($credentials, $debug);
$product = $client->getProduct($id);

$product_tpl = new Frisbeebutik_Frontend;
$product_tpl->assign('product', $product);
$product_tpl->assign('client', $client);
$product_tpl->assign('related_products', $client->getRelatedProducts($id));

$main = new Frisbeebutik_Frontend;
$main->assign('title', $product['name']);
$main->assign('description', $product['description']);
$main->assign('keywords', '');
$main->assign('content_main', $product_tpl->fetch('product-tpl.php'));

echo $main->fetch('main-tpl.php');
?>