<?php
require 'include_webshop.php';
require 'Frisbeebutik/Frontend.php';
require 'IntrafacePublic/Shop/XMLRPC/Client.php';

$basket_client = new IntrafacePublic_Shop_XMLRPC_Client($credentials);

if (isset($_GET['add']) AND is_numeric($_GET['add'])) {
    $basket_client->addBasket(intval($_GET['add']));
}

// settings
$porto_produkt_id = 6125;
$rabat_produkt_id = 6102;
$rabat_procent = 0.15;

if(!empty($_POST['update']) AND is_array($_POST['quantity'])) {
  foreach($_POST['quantity'] as $key => $antal) {
        if (!$basket_client->changeBasket($key, $antal)) {
            $error[$key] = 'S� mange er der ikke p� lager af dette produkt';
        }
  }
}

$basket = $basket_client->getBasket();

// l�gge porto til:
$weight = $basket['weight'] + 200;

if ($weight >= 1000 AND $weight <= 5000) {
    $porto_pris = 70;
}
elseif ($weight > 5000 AND $weight <= 10000) {
    $porto_pris = 80;
}
elseif ($weight > 10000) {
    $porto_pris = 130;
}
else {
    $porto_pris = 60;
}

$basket_client->changeBasket($porto_produkt_id, $porto_pris);

// totale pris
$total = $basket['price_total'];

// hvis totalen ikke er h�jere end portoen skal portoen slettes
if ($total == $porto_pris) {
    $basket_client->changeBasket($porto_produkt_id, 0);
}

// her er en lille fejl, fordi den opdaterer sig selv if�lge den nye �ndrede pris
if ($total > (1000 + $porto_pris)) {
    $basket_client->changeBasket($rabat_produkt_id, round($total * $rabat_procent));
}
else {
    $basket_client->changeBasket($rabat_produkt_id, 0);
}

// basket
$basket_tpl = new Frisbeebutik_Frontend;
$basket_tpl->assign('items', $basket['items']);
$basket_tpl->assign('error', $error);
$basket_tpl->assign('total_price', $basket['price_total']);
$basket_tpl->assign('porto_produkt_id', $porto_produkt_id);
$basket_tpl->assign('rabat_produkt_id', $rabat_produkt_id);
$basket_tpl->assign('weight', $weight);

// template
$main = new Frisbeebutik_Frontend;
$main->assign('title', 'Indk�bskurv');
$main->assign('description', '');
$main->assign('keywords', '');
$main->assign('content_main', $basket_tpl->fetch('basket-tpl.php'));

echo $main->fetch('main-tpl.php');
?>