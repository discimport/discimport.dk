<?php
require('include_webshop.php');

# viser html på frisbeebutik.dk
$main = new Template(PATH_TEMPLATE);
$main->set('title', 'Indkøbskurv');
$main->set('description', '');
$main->set('keywords', '');
$main->set('content_main', '

<h1>Hjælp!</h1>  

<h4>Hvordan bestiller jeg varer?</h4>

<ol>
	<li>Find den ønskede vare.</li>
	<li>Når varen er fundet, klikker du på Køb. Du har altid mulighed for at ændre antallet inde fra indkøbskurven. Du kan også fjerne varen ved at skrive nul.</li>
    <li>Når din indkøbskurv ser ud, som du gerne vil have det, skal du gå til kassen.</li>
    <li>Ved kassen indtaster du adresseoplysninger og klikker køb. Alle felter skal udfyldes.    </li>
</ol>

<h4>Hvordan kan jeg betale mine varer ?</h4>
<p>Se <a href="handelsbetingelser.php">handelsbetingelserne</a>.</p>
');

echo $main->fetch('main-tpl.php');
?>
<!--
Så enkelt er det at bestille på stormagasinet.dk!  	
På stormagasinet.dk har vi gjort det let at gøre et godt køb!

1. Find den ønskede vare
Brug menufunktionen eller søgefeltet i venstre side af shoppen til at finde frem til den vare du ønsker at købe.

2. Læg varen i indkøbskurven
Når du har fundet den ønskede vare klikker du på "Føj til kurven" hvis du står i vareoversigten, eller på "Køb nu" hvis du er på produktets egen side. Herefter vises indholdet af din indkøbskurv og du kan tilrette antal eller slette varen. Ønsker du at købe flere varer klikker du på "Fortsæt indkøb". Er du færdig med at shoppe klikker du på "Gå til kassen".

3. Indtast forsendelsesoplysninger
Når du har klikket på "Gå til kassen" bliver du bedt om at indtaste dine adresseoplysninger. Ønsker du at få varen leveret til et andet sted end til din egen adresse , f.eks. hvis varen er en gave, eller hvis du hellere vil modtage varen på din arbejdsplads, kan du angive en separat leveringsadresse.

4. Vælg betalingsmåde
Vælg mellem Dankort/VISA Dankort, eWire online betaling eller bankoverførsel. Betaling med Dankort/VISA Dankort foregår naturligvis via en sikker, krypteret SSL forbindelse som er godkendt af PBS. På stormagasinet.dk opkræves ingen former for betalingsgebyrer.

5. Godkend og afslut ordren
På ordrebekræftelsen bør du kontrollere, at alle oplysninger er korrekte. Ændringer foretages nemt ved at klikke på "Ret". Inden du godkender din ordre skal du markere, at du accepterer vores handelsbetingelser. Dette er et lovkrav.

Klik på "Godkend". Har du valgt betaling med Dankort eller eWire skal du herefter indtaste de relevante oplysninger via en SSL krypteret side. Har du valgt at betale via en bankoverførsel er ordren afsluttet.

Når du har godkendt din ordre korrekt ser du en "tak for din bestilling" kvittering på skærmen og du modtager en udførlig ordrebekræftelse per e-mail - så let er det!
-->