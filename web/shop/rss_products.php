<?php
/**
 * RSS for srodukts
 *
 * @package Webshop
 * @author	Lars Olesen <lars@legestue.net>
 * @since   0.1.0
 * @version @package-version@
 */

require 'include_webshop.php';
require 'Savant3.php';
require 'XML/RPC2/Client.php';

$tpl = new Savant3();
$tpl->addPath('template', PATH_TEMPLATE);

$tpl->assign('title', 'Discimport.dk');
$tpl->assign('link', 'http://www.frisbeebutik.dk/');
$tpl->assign('language', 'da');
$tpl->assign('description', 'Denne feed giver dig de nyeste produkter fra Discimport.dk.');

$options = array(
    'prefix' => 'products.'
);

$client = XML_RPC2_Client::create('http://www.intraface.dk/xmlrpc/webshop/server2.php', $options);

$products = $client->getList($credentials, '');

$i = 0;
foreach ($products['products'] AS $product) {
	$item[$i]['guid'] = md5($product['id'] . $product['changed_date']);
	$item[$i]['title'] = $product['name'];
	$item[$i]['description'] = $product['description'] . ' <a href="http://www.frisbeebutik.dk/shop/basket.php?add='.$product['id'].'">Køb</a>.';
	$item[$i]['author'] = htmlspecialchars('Mikael Johansen <mikael@discimport.dk>');
	$item[$i]['link'] = 'http://www.frisbeebutik.dk/shop/product.php?id='.$product['id'];
	$item[$i]['enclosure']['link'] = $product['pictures'][0]['small']['file_uri'];
	$item[$i]['pubDate'] = $product['changed_date'];
	$i++;
}

$tpl->assign('items', $item);
header('Content-Type: application/xml; charset=ISO-8859-1');
echo $tpl->fetch('rss2.0-tpl.php');
?>