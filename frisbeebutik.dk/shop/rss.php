<?php
/**
 * Produkter
 *
 * @author	Lars Olesen <lars@legestue.net> 
 */

require('include_webshop.php');


$tpl = & new CachedTemplate(PATH_TEMPLATE, PATH_CACHE, md5($_SERVER['REQUEST_URI'] . 'rss produkter'), 3600);
if(!($tpl->is_cached())) { 

	$tpl->set('title', 'Discimport.dk');
	$tpl->set('link', 'http://www.frisbeebutik.dk/');
	$tpl->set('language', 'da');
	$tpl->set('description', 'Denne feed giver dig de nyeste produkter fra Discimport.dk.');		

	$client = new WebshopClient(array('private_key' => INTRAFACE_PRIVATE_KEY), false);
	$products = $client->getProducts(array('area' => 'rss', 'sorting' => 'date', 'limit' => 50));

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
	
	$tpl->set('items', $item);


}
//header('Content-Type: application/xml; charset=ISO-8859-1');
echo $tpl->fetch('rss2.0-tpl.php');
?>