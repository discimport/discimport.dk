<?php
/**
 * Produkter
 *
 * Denne side skal vise produkter til webshoppen
 *
 * Oversigten skal opfylde følgende kriterier
 * - produkter der ikke er på lager, skal vises som IKKE PÅ LAGER
 * 
 * Der skal vises tilfældige produkter på forsiden der er på lager - og så 
 * tilbudsvarer
 *
 * @author	Lars Olesen <lars@legestue.net> 
 */

class Webshop_HTML_Parser {

	function parsePaging($paging_array, $link = '', $this_page) {
		$output = '';
		$j = 1;
		if (empty($link)) {
			$link = $_SERVER['PHP_SELF'];
		}
		if (empty($this_page)) {
			$this_page = (int)$_GET['start'];
		}
		if (is_array($paging_array) AND count($paging_array) > 0) {
			foreach($paging_array['offset'] AS $paging) {
				$output .= ' | ';
				if ($this_page == $paging) {
					$output .= '<strong>'.$j.'</strong>';
				}
				else {
					$output .= '<a href="'.$link.'?start='.$paging;
					$output .= '">'.$j.'</a> ';
				}
				$j++;
			}
			$output .= ' |';
		}
		return $output;
	}


} 
 
 
require('include_webshop.php');

# åbner webshoppen
$client = new WebshopClient(array('private_key' => INTRAFACE_PRIVATE_KEY), false);

#tpl
$list = new Template(PATH_TEMPLATE);


$search['area'] = 'webshop';
$search['use_paging'] = 'true';

if (array_key_exists('start', $_GET)) {
	$search['offset'] = (int)$_GET['start'];
	$products = $client->getProducts($search);
}
elseif (!empty($_GET['q']) OR !empty($_GET['keyword'])) {
	if (!empty($_GET['q'])) $search['search'] = utf8_encode($_GET['q']);
	if (!empty($_GET['keyword'])) $search['keywords'] = $_GET['keyword'];

	$products = $client->getProducts($search);
	$err_msg = 'Der var ikke nogen produkter med den pågældende søgning';
	$list->set('headline', 'Søgning: ' . htmlspecialchars($_GET['q']));
}
else {
	//$products = $client->getProductsByKeywords(array(265,266));
	$search['search'] = '';
	$products = $client->getProducts($search);	
	$list->set('headline', 'Alle produkter');
}

$paging = $products['paging'];
$products = $products['products'];

# viser produkterne
$list->set('products', $products);
$list->set('no_results_msg', $err_msg);
$list->set('paging', Webshop_HTML_Parser::parsePaging($paging));

# viser html på frisbeebutik.dk
$main = new Template(PATH_TEMPLATE);
$main->set('title', 'Discimport.dk - ' . $_GET['q']);
$main->set('description', '');
$main->set('keywords', '');
$main->set('content_main', $list->fetch('products-tpl.php'));

echo $main->fetch('main-tpl.php');
?>