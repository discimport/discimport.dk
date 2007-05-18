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
require 'IntrafacePublic/Shop/XMLRPC/Client.php';
require 'Frisbeebutik/Frontend.php';

$client = new IntrafacePublic_Shop_XMLRPC_Client($credentials);
$html = '';

$list = new Frisbeebutik_Frontend;

$search['keywords'] = array(265);
$products = $client->getProducts($credentials, $search);
$products = $products['products'];

if (count($products) > 0) {
    # viser produkterne
    $list->assign('headline', 'Nyheder');
    $list->assign('products', $products);
    $list->assign('no_results_msg', $err_msg);
    $html .= $list->fetch('products-feature-tpl.php');
}

$search['keywords'] = array(266);
$products = $client->getProducts($credentials, $search);

$products = $products['products'];

if (count($products) > 0) {
    $list->assign('headline', 'Tilbud');
    $list->assign('products', $products);
    $list->assign('no_results_msg', $err_msg);
    $html .= $list->fetch('products-feature-tpl.php');
}

$tpl = new Frisbeebutik_Frontend;
$tpl->assign('title', 'Discimports butik');
$tpl->assign('description', '');
$tpl->assign('keywords', '');
$tpl->assign('content_main', '<h1>Nyheder og tilbud</h1>' . $html);

$tpl->display('main-tpl.php');
?>