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
        if (empty($this_page) AND !empty($_GET['start'])) {
            $this_page = (int)$_GET['start'];
        }
        else {
            $this_page = 1;
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

require 'include_shop.php';
require 'Frisbeebutik/Frontend.php';
require 'IntrafacePublic/Shop/XMLRPC/Client.php';

$debug = true;
$client = new IntrafacePublic_Shop_XMLRPC_Client($credentials, $debug, PATH_XMLRPC . 'shop/server3.php');

$list = new Frisbeebutik_Frontend;
$search['area'] = 'webshop';
$search['use_paging'] = 'true';

if (!empty($_GET['start'])) {
    $search['offset'] = (int)$_GET['start'];
    $products = $client->getProducts($credentials, $search);
}
elseif (!empty($_GET['q']) OR !empty($_GET['keyword'])) {

    if (!empty($_GET['q'])) $search['search'] = $_GET['q'];
    if (!empty($_GET['keyword'])) $search['keywords'] = $_GET['keyword'];
    $products = $client->getProducts($search);
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
$list->assign('paging', Webshop_HTML_Parser::parsePaging($paging));

$main = new Frisbeebutik_Frontend;
$main->assign('title', 'Discimport.dk products');
$main->assign('description', '');
$main->assign('keywords', '');
$main->assign('content_main', $list->fetch('products-tpl.php'));

$main->display('main-tpl.php');
?>