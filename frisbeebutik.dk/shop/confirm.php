<?php
require('include_webshop.php');

# viser html p� frisbeebutik.dk
$main = new Template(PATH_TEMPLATE);
$main->set('title', 'Indk�bskurv');
$main->set('description', '');
$main->set('keywords', '');
$main->set('content_main', '
<h1>Send bestilling</h1>

<p>Trin 3 af 3</p>

<h3>Nu sker der f�lgende</h3>

<ol>
  <li><h4>Ordren modtages</h4>
  			<p>Vi modtager ordren og behandler den i l�bet af h�jst 7 arbejdsdage. <strong>Dog leverer vi ikke i december.</strong></p>
  </li>
  <li><h4>Ordren sendes</h4>
      <p>Ordren sendes som almindelig brev med Post Danmark. De bruger typisk 1-2 
      dage med at f� produktet frem.</p>
  </li>
  <li><h4>Du pakker ud</h4>
      <p>Forventningsfuld �bner du brevet og begynder at kigge p� tingene. 
      Hvis der er nogle problemer med leverancen, kontakter du os.</p>
  </li>
</ol>

');

echo $main->fetch('main-tpl.php');
?>