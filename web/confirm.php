<?php
require 'include_shop.php';
require 'Frisbeebutik/Frontend.php';

$main = new Frisbeebutik_Frontend;
$main->assign('title', 'Order confirmation');
$main->assign('description', '');
$main->assign('keywords', '');
$main->assign('content_main', '
<h1>Send bestilling</h1>

<p>Trin 3 af 3</p>

<h3>Nu sker der følgende</h3>

<ol>
    <li>
        <h4>Ordren modtages</h4>
        <p>Vi modtager ordren og behandler den i løbet af højst 7 arbejdsdage.</p>
    </li>
    <li><h4>Ordren sendes</h4>
        <p>Ordren sendes som almindelig brev med Post Danmark. De bruger typisk 1-2 dage med at få produktet frem.</p>
    </li>
    <li>
        <h4>Du pakker ud</h4>
        <p>Forventningsfuld åbner du brevet og begynder at kigge på tingene. Hvis der er nogle problemer med leverancen, kontakter du os.</p>
    </li>
</ol>
');

$main->display('main-tpl.php');
?>