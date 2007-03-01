<?php
require 'include_webshop.php';
require 'XML/RPC2/Client.php';
require 'Savant3.php';

$options = array(
    'prefix' => 'basket.'
);

$basket_client = XML_RPC2_Client::create('http://www.intraface.dk/xmlrpc/webshop/server2.php', $options);

if (isset($_GET['add']) AND is_numeric($_GET['add'])) {
	$basket_client->add($credentials, intval($_GET['add']));
}

// settings
$porto_produkt_id = 6125;
$rabat_produkt_id = 6102;
$rabat_procent = 0.15;

if(!empty($_POST['update']) AND is_array($_POST['quantity'])) {
  foreach($_POST['quantity'] as $key => $antal) {
		if (!$basket_client->change($credentials, $key, $antal)) {
			$error[$key] = 'Så mange er der ikke på lager af dette produkt';
		}
  }
}

$basket = $basket_client->get($credentials);

// lægge porto til:
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

$basket_client->change($credentials, $porto_produkt_id, $porto_pris);

// totale pris
$total = $basket['price_total'];

// hvis totalen ikke er højere end portoen skal portoen slettes
if ($total == $porto_pris) {
	$basket_client->change($credentials, $porto_produkt_id, 0);
}

// her er en lille fejl, fordi den opdaterer sig selv ifølge den nye ændrede pris
if ($total > (1000 + $porto_pris)) {
	$basket_client->change($credentials, $rabat_produkt_id, round($total * $rabat_procent));
}
else {
	$basket_client->change($credentials, $rabat_produkt_id, 0);
}

// basket
$basket_tpl = new Savant3();
$basket_tpl->addPath('template', PATH_TEMPLATE);
$basket_tpl->assign('items', $basket['items']);
$basket_tpl->assign('error', $error);
$basket_tpl->assign('total_price', $basket['price_total']);
$basket_tpl->assign('porto_produkt_id', $porto_produkt_id);
$basket_tpl->assign('rabat_produkt_id', $rabat_produkt_id);
$basket_tpl->assign('weight', $weight);

// template
$main = new Savant3();
$main->addPath('template', PATH_TEMPLATE);
$main->assign('title', 'Indkøbskurv');
$main->assign('description', '');
$main->assign('keywords', '');
$main->assign('content_main', $basket_tpl->fetch('basket-tpl.php'));

echo $main->fetch('main-tpl.php');
?>