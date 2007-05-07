<?php
/**
 * Products
 *
 * @package Webshop
 * @author	Lars Olesen <lars@legestue.net>
 * @since   0.1.0
 * @version @package-version@
 */

class Webshop_HTML_Parser {

	static function parsePaging($paging_array, $link = '', $this_page = '') {
		$output = '';
		$j = 1;
		if (empty($link)) {
			$link = basename($_SERVER['PHP_SELF']);
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

require 'include_webshop.php';
require 'Savant3.php';
require 'IntrafacePublic/Shop/XMLRPC/Client.php';

$client = new IntrafacePublic_Shop_XMLRPC_Client($credentials);

$list = new Savant3();
$list->addPath('template', PATH_TEMPLATE);


$search['area'] = 'webshop';
$search['use_paging'] = 'true';

if (array_key_exists('start', $_GET)) {
	$search['offset'] = (int)$_GET['start'];
	$products = $client->getProducts($credentials, $search);
}
elseif (!empty($_GET['q']) OR !empty($_GET['keyword'])) {
	if (!empty($_GET['q'])) $search['search'] = utf8_encode($_GET['q']);
	if (!empty($_GET['keyword'])) $search['keywords'] = $_GET['keyword'];

	$products = $client->getProducts($credentials, $search);
	$err_msg = 'Der var ikke nogen produkter med den pågældende søgning';
	$list->assign('headline', 'Søgning: ' . htmlspecialchars($_GET['q']));
}
else {
	$search['search'] = '';
	$products = $client->getProducts($credentials, $search);
	$list->assign('headline', 'Alle produkter');
}

$paging = $products['paging'];
$products = $products['products'];

$list->assign('products', $products);
$list->assign('no_results_msg', $err_msg);
$list->assign('paging', Webshop_HTML_Parser::parsePaging($paging));

$main = new Savant3();
$main->addPath('template', PATH_TEMPLATE);
$main->assign('title', 'Discimport.dk - ' . htmlspecialchars($_GET['q']));
$main->assign('description', '');
$main->assign('keywords', '');
$main->assign('content_main', $list->fetch('products-tpl.php'));

echo $main->fetch('main-tpl.php');
?>