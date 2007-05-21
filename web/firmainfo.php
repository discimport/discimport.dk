<?php
require 'include_shop.php';
require 'Frisbeebutik/Frontend.php';

$main = new Frisbeebutik_Frontend;
$main->assign('title', 'Discimport.dk: Firmaoplysninger');
$main->assign('description', '');
$main->assign('keywords', '');
$main->assign('content_main', '
<h1>Firmaoplysninger</h1>

<p>Webshoppen ejes og drives af:</p>

<p class="vcard">
<span class="fn">Discimport.dk</span>
<span class="address">
co/ Mikael Birkelund Johansen<br />
Vestre Ringgade 60, 1. mf<br />
8000 �rhus C</span>
<br />Telefon: <span class="tel">51 92 40 93</span>
<br />E-mail: <span class="email">mikael@discimport.dk</span>
<br />SE/CVR Nr.: 28 37 03 18
<br /><a href="http://www.discimport.dk/" class="url">www.discimport.dk</a>
</p>

<h2>Virksomhedsform</h2>
<p>Discimport.dk er et interessentselskab, etableret i 2005, men vi har solgt discs gennem Fodboldens Legestue siden 1999.</p>

<h2>Bem�rk venligst</h2>

<p>Discimport.dk driver udelukkende internetvirksomhed, hvorfor der ikke er mulighed for personlig betjening p� adressen uden forudg�ende aftale.</p>
');

$main->display('main-tpl.php');
?>