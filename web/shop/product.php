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

$client = new WebshopClient(array('private_key' => INTRAFACE_PRIVATE_KEY), false);

$product = $client->getProduct((int)$_GET['id']);
//print_r($product);
# viser produkterne
# der skal laves sådan at den ikke automatisk viser alle produkterne på en lang liste
$product_tpl = new Template(PATH_TEMPLATE);
$product_tpl->set('product', $product);

# hvad mon den skal der?
$product_tpl->set('client', $client);
$product_tpl->set('related_products', $client->getRelatedProducts((int)$_GET['id']));

# her kunne selve produkterne måske vises på selve discimport.dk?

# viser html på frisbeebutik.dk
$main = new Template(PATH_TEMPLATE);
$main->set('title', $product['name']);
$main->set('description', $product['description']);
$main->set('keywords', '');
$main->set('content_main', $product_tpl->fetch('product-tpl.php'));

echo $main->fetch('main-tpl.php');
?>