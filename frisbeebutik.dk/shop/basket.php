<?php
require('include_webshop.php');

# �bner webshoppen
$client = new WebshopClient(array('private_key' => INTRAFACE_PRIVATE_KEY), false);

# tilf�jer til basket
if (isset($_GET['add']) AND is_numeric($_GET['add'])) {
	$client->addBasket($_GET['add']);
}

# settings til siden
$porto_produkt_id = 6125;
$rabat_produkt_id = 6102;
$rabat_procent = 0.15;

//$client = new WebshopClient(false);

if(!empty($_POST['update']) AND is_array($_POST['quantity'])) {		
  foreach($_POST['quantity'] as $key => $antal) {
		if (!$client->changeBasket($key, $antal)) {
			$error[$key] = 'S� mange er der ikke p� lager af dette produkt';
		}
  }
}

$basket = $client->getBasket();

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

$client->changeBasket($porto_produkt_id, $porto_pris);

// totale pris
$total = $basket['price_total'];

// hvis totalen ikke er h�jere end portoen skal portoen slettes
if ($total == $porto_pris) {
	$client->changeBasket($porto_produkt_id, 0);
}

// her er en lille fejl, fordi den opdaterer sig selv if�lge den nye �ndrede pris
if ($total > (1000 + $porto_pris)) {
	$client->changeBasket($rabat_produkt_id, round($total * $rabat_procent));
}
else {
	$client->changeBasket($rabat_produkt_id, 0);
}


# viser produkterne
# der skal laves s�dan at den ikke automatisk viser alle produkterne p� en lang liste
$basket_tpl = new Template(PATH_TEMPLATE);
$basket_tpl->set('items', $basket['items']);
$basket_tpl->set('error', $error);
$basket_tpl->set('total_price', $basket['price_total']);
$basket_tpl->set('porto_produkt_id', $porto_produkt_id);
$basket_tpl->set('rabat_produkt_id', $rabat_produkt_id);
$basket_tpl->set('weight', $weight);

# her kunne selve produkterne m�ske vises p� selve discimport.dk?

# viser html p� frisbeebutik.dk
$main = new Template(PATH_TEMPLATE);
$main->set('title', 'Indk�bskurv');
$main->set('description', '');
$main->set('keywords', '');
$main->set('content_main', $basket_tpl->fetch('basket-tpl.php'));

echo $main->fetch('main-tpl.php');

echo $basket['timer'];
?>