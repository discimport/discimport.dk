<?php
require 'include_shop.php';
require 'Frisbeebutik/Frontend.php';
require 'IntrafacePublic/Shop/XMLRPC/Client.php';

$debug = false;
$basket_client = new IntrafacePublic_Shop_XMLRPC_Client($credentials, $debug, PATH_XMLRPC . 'shop/server3.php');

if (isset($_GET['add']) AND is_numeric($_GET['add'])) {
    $basket_client->addBasket(intval($_GET['add']));
}

if(!empty($_POST['update']) AND is_array($_POST['quantity'])) {
    foreach($_POST['quantity'] as $key => $antal) {
        if (!$basket_client->changeBasket(intval($key), intval($antal))) {
            $error[$key] = 'Så mange er der ikke på lager af dette produkt';
        }
    }
}

$basket = $basket_client->getBasket();

// basket
$basket_tpl = new Frisbeebutik_Frontend;
$basket_tpl->assign('items', $basket['items']);
$basket_tpl->assign('total_price', $basket['price_total']);


// template
$main = new Frisbeebutik_Frontend;
$main->assign('title', 'Indkøbskurv');
$main->assign('description', '');
$main->assign('keywords', '');
$main->assign('content_main', $basket_tpl->fetch('basket-tpl.php'));

$main->display('main-tpl.php');
?>