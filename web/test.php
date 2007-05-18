<?php
/**
 * Products
 *
 * @package Intraface Webshop
 * @author	Lars Olesen <lars@legestue.net>
 * @since   0.1.0
 * @version 0.1.0
 */

require 'include_webshop.php';
require 'Intraface/Webshop/Product.php';
require 'Intraface/Webshop/Frontend/Products.php';
require 'Savant3.php';

$client = new Intraface_Webshop_Product($credentials);

$frontend = new Webshop_Frontend_Products(new Savant3());
$html = $frontend->display($client->getList(), '');

$tpl = new Savant3();
$tpl->setEscape('htmlspecialchars');
$tpl->addPath('template', PATH_TEMPLATE);

$tpl->assign('title', 'Discimports butik');
$tpl->assign('description', '');
$tpl->assign('keywords', '');
$tpl->assign('content_main', '<h1>Nyheder og tilbud</h1>' . $html);

$tpl->display('main-tpl.php');
?>