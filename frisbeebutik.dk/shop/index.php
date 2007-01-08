<?php
/**
 * Produkter
 *
 * Denne side skal vise produkter til webshoppen
 *
 * Oversigten skal opfylde f�lgende kriterier
 * - produkter der ikke er p� lager, skal vises som IKKE P� LAGER
 * 
 * Der skal vises tilf�ldige produkter p� forsiden der er p� lager - og s� 
 * tilbudsvarer
 *
 * @author	Lars Olesen <lars@legestue.net> 
 */
require('include_webshop.php');

# �bner webshoppen
$client = new WebshopClient(array('private_key' => INTRAFACE_PRIVATE_KEY), false);

$html = '';

$list = new Template(PATH_TEMPLATE);

#
# NYHEDER
#
$search['keywords'] = array(265);
$products = $client->getProducts($search);	

# henter produkterne
$products = $products['products'];

if (count($products) > 0) {
	# viser produkterne
	$list->set('headline', 'Nyheder');
	$list->set('products', $products);
	$list->set('no_results_msg', $err_msg);
	$html .= $list->fetch('products-feature-tpl.php');
}

#
# TILBUD
#

$search['keywords'] = array(266);
$products = $client->getProducts($search);	

# henter produkterne
$products = $products['products'];

if (count($products) > 0) {
	# viser produkterne
	$list->set('headline', 'Tilbud');
	$list->set('products', $products);
	$list->set('no_results_msg', $err_msg);
	$html .= $list->fetch('products-feature-tpl.php');
}


# viser html p� frisbeebutik.dk
$tpl = new Template(PATH_TEMPLATE);
$tpl->set('title', 'Discimports butik');
$tpl->set('description', '');
$tpl->set('keywords', '');
$tpl->set('content_main', '<h1>Nyheder og tilbud</h1>' . $html);

echo $tpl->fetch('main-tpl.php');
?>