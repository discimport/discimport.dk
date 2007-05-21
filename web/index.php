<?php
/**
 * Products
 *
 * @package Intraface Webshop
 * @author	Lars Olesen <lars@legestue.net>
 * @version @package-version@
 */

require 'include_shop.php';
require 'IntrafacePublic/Shop/XMLRPC/Client.php';
require 'Frisbeebutik/Frontend.php';

$debug = false;
$client = new IntrafacePublic_Shop_XMLRPC_Client($credentials, $debug, PATH_XMLRPC . 'shop/server3.php');

$html = '';

$featured_products = $client->getFeaturedProducts($credentials);

foreach ($featured_products AS $products) {
    $list = new Frisbeebutik_Frontend;
    $list->assign('headline', $products['title']);
    $list->assign('products', $products['products']);
    $html .= $list->fetch('products-feature-tpl.php');
}

$tpl = new Frisbeebutik_Frontend;
$tpl->assign('title', 'Discimports butik');
$tpl->assign('description', '');
$tpl->assign('keywords', '');
$tpl->assign('content_main', '<h1>Nyheder og tilbud</h1>' . $html);

$tpl->display('main-tpl.php');
?>