<?php
require('include_webshop.php');

# viser html p� frisbeebutik.dk
$main = new Template(PATH_TEMPLATE);
$main->set('title', 'Indk�bskurv');
$main->set('description', '');
$main->set('keywords', '');
$main->set('content_main', '

<h1>Hj�lp!</h1>  

<h4>Hvordan bestiller jeg varer?</h4>

<ol>
	<li>Find den �nskede vare.</li>
	<li>N�r varen er fundet, klikker du p� K�b. Du har altid mulighed for at �ndre antallet inde fra indk�bskurven. Du kan ogs� fjerne varen ved at skrive nul.</li>
    <li>N�r din indk�bskurv ser ud, som du gerne vil have det, skal du g� til kassen.</li>
    <li>Ved kassen indtaster du adresseoplysninger og klikker k�b. Alle felter skal udfyldes.    </li>
</ol>

<h4>Hvordan kan jeg betale mine varer ?</h4>
<p>Se <a href="handelsbetingelser.php">handelsbetingelserne</a>.</p>
');

echo $main->fetch('main-tpl.php');
?>
<!--
S� enkelt er det at bestille p� stormagasinet.dk!  	
P� stormagasinet.dk har vi gjort det let at g�re et godt k�b!

1. Find den �nskede vare
Brug menufunktionen eller s�gefeltet i venstre side af shoppen til at finde frem til den vare du �nsker at k�be.

2. L�g varen i indk�bskurven
N�r du har fundet den �nskede vare klikker du p� "F�j til kurven" hvis du st�r i vareoversigten, eller p� "K�b nu" hvis du er p� produktets egen side. Herefter vises indholdet af din indk�bskurv og du kan tilrette antal eller slette varen. �nsker du at k�be flere varer klikker du p� "Forts�t indk�b". Er du f�rdig med at shoppe klikker du p� "G� til kassen".

3. Indtast forsendelsesoplysninger
N�r du har klikket p� "G� til kassen" bliver du bedt om at indtaste dine adresseoplysninger. �nsker du at f� varen leveret til et andet sted end til din egen adresse , f.eks. hvis varen er en gave, eller hvis du hellere vil modtage varen p� din arbejdsplads, kan du angive en separat leveringsadresse.

4. V�lg betalingsm�de
V�lg mellem Dankort/VISA Dankort, eWire online betaling eller bankoverf�rsel. Betaling med Dankort/VISA Dankort foreg�r naturligvis via en sikker, krypteret SSL forbindelse som er godkendt af PBS. P� stormagasinet.dk opkr�ves ingen former for betalingsgebyrer.

5. Godkend og afslut ordren
P� ordrebekr�ftelsen b�r du kontrollere, at alle oplysninger er korrekte. �ndringer foretages nemt ved at klikke p� "Ret". Inden du godkender din ordre skal du markere, at du accepterer vores handelsbetingelser. Dette er et lovkrav.

Klik p� "Godkend". Har du valgt betaling med Dankort eller eWire skal du herefter indtaste de relevante oplysninger via en SSL krypteret side. Har du valgt at betale via en bankoverf�rsel er ordren afsluttet.

N�r du har godkendt din ordre korrekt ser du en "tak for din bestilling" kvittering p� sk�rmen og du modtager en udf�rlig ordrebekr�ftelse per e-mail - s� let er det!
-->