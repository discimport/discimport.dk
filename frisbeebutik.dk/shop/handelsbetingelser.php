<?php
require('include_webshop.php');

# viser html p� frisbeebutik.dk
$main = new Template(PATH_TEMPLATE);
$main->set('title', 'Discimport.dk');
$main->set('description', '');
$main->set('keywords', '');
$main->set('content_main', '
<h1>Salgs- og leveringsbetingelser</h1>  	

<h2>Generelt</h2>
<p>Nedenst�ende salgs- og leveringsbetingelser g�lder for alle handler indg�et med Discimport.dk.</p>

<h2>Priser</h2>

<p>Alle priser p� hjemmesiden er kontante enhedspriser inkl. moms. Discimport.dk forbeholder sig ret til at �ndre priser uden varsel.</p>

<h2>Bestilling</h2>

<p>Alle varer kan bestilles online i vores webshop.</p>

<p>Du er altid velkommen til at at sende en <a href="firmainfo.php">e-mail</a>, hvis du s�ger andre former for discs. Vi unders�ger gerne muligheden for at bestille dem hjem.</p>

<p>Discimport.dk svarer gerne p� henvendelser ang�ende produkter og leveringstid inden k�b.</p>

<h2>Betaling</h2>
<p>I vores webshop kan du betale med f�lgende betalingsmidler:</p>

<ul>
	<li>Bankoverf�rsel</li>
</ul>

<!--
Data du sender i forbindelse med k�b betalt med betalingskort er krypterede (SSL), og det er s�ledes kun PBS, der kan l�se dem. Hverken stormagasinet eller andre har mulighed for at l�se dataene.

Betales med betalingskort er du altid sikret mod misbrug. Du har nemlig mulighed for at afvise en betaling, n�r du modtager din betalingsoversigt. Du har ingen selvrisiko i tilf�lde af, at dit kort bliver misbrugt i en internetbutik, der benytter SSL (Secure Socket Layer) i sit betalingssystem. Dermed er du bedre sikret end i den fysiske verden, hvor du har en selvrisiko p� 1.200,- kr. n�r dit Dankort misbruges ved brug af pin-koden.

Bel�bet for varerne tr�kkes f�rst, n�r varerne sendes fra stormagasinet. Der kan aldrig tr�kkes et st�rre bel�b, end det du har godkendt ved k�bet.
-->

<h2>Levering</h2>
<p>Discimport.dk sender med PostDanmark over hele Danmark (eksl. Gr�nland og F�r�erne).</p>

<p>Alle ordrer leveres inden for 3-10 hverdage, medmindre andet fremg�r under beskrivelsen af det enkelte produkt. Der tages imidlertid forbehold for udsolgte og udg�ede varer samt forl�nget leveringstid og leveringssvigt af varer fra vores leverand�rer.</p>

<h2>Reklamationsret</h2>

<p>Du har efter k�beloven reklamationsret i 24 m�neder p� alle varer. Reklamationsretten betyder, at du som kunde kan klage over fejl og mangler ved produktet som er opst�et 24 m�neder efter k�bet. Der er ingen reklamationsret p� discs, som er g�et i stykker p� grund af slid eller forkert behandling. Kn�kkede discs byttes som hovedregel ikke.</p>

<p>Sender du discs tilbage, skal udf�rlig fejlbeskrivelse samt kopi af faktura medsendes. Discimport.dk forbeholder sig ret til at kreditere varen til dens oprindelige pris.</p>

<p>Inden returnering af varer til Discimport.dk skal der rettes henvendelse til Discimport.dk med henblik p� rekvirering af returnummer.</p>

<p>Returvarer sendes til <a href="firmainfo.php">vores adresse</a>. Returnummer skal anf�res p� pakken. Uforsvarlig forsendelse vil medf�re bortfald af reklamationsret samt returnering for egen regning.</p>

<p>Discimport.dk er uden ansvar for enhver forsinkelse som f�lge af afhj�lpningen eller ombytningen.</p>

<h2>Returret</h2>

<p>Discimport.dk yder 14 dages returret fra den dag varen modtages. Returnering sker for kundens regning.</p>

<p>For at udnytte returretten, skal varen returneres i samme stand som den blev modtaget. Da varens emballage repr�senterer en v�rdi ifbm. gensalg af varen, bedes varen returneret i den emballage du modtog varen i.</p>

<p>Uforsvarlig forsendelse vil medf�re bortfald af returret samt genlevering for egen regning.</p>

<p>Returvarer sendes til <a href="firmainfo.php">vores adresse</a>.</p>

<p>Du kan returnere varen til os ved at n�gte at modtage varen n�r den leveres.</p>

<p>N�r vi har modtaget varen retur og kontrolleret, at den lever op til betingelserne for at fortrydelsesretten kan udnyttes, tilbagebetales den totale k�besum til dig ved en overf�rsel til din bank. Det vil lette vores ekspedition, hvis du samtidigt sender os oplysninger om dit pengeinstitut. Vi skal bruge f�lgende oplysninger: Bankens navn, bankens registreringsnummer (4 cifre) samt dit kontonummer (10 cifre).</p>

<h2>E-markedsf�ring</h2>

<p>Der udsendes ingen e-mail-reklamer eller lignende fra Discimport.dk uden dit udtrykkelige/aktive samtykke hertil (f.eks. nyhedsbrevet).</p>

<h2>Persondatapolitik</h2>

<h3>Cookies</h2>

<p>En cookie er en betegnelse for det forhold, at en brugers adf�rd p� et netv�rk registreres hos brugeren selv (p� brugerens harddisk). P� den m�de ved serveren (fx. et websted) ved brugerens n�ste bes�g, hvem brugeren er. Der lagres ikke personhenf�rbare oplysninger i en cookie, men snarere oplysninger om brugerens adf�rd p� et website fx. et indtastet brugernavn i forbindelse med login til en s�rlig sektion p� webstedet. En cookie lagres p� brugens harddisk sammen med cachede filer. En cookie er s�ledes en tekstfil, der sendes til din browser fra en webserver og lagres p� din computers harddisk. Du kan s�tte din browser til at informere dig, n�r du modtager en cookie, eller du kan v�lge at sl� cookies helt fra.</p>

<p>P� Discimport.dk anvendes cookies med det form�l at optimere websitet og dets funktionaliteter. Cookies bruges p� til at huske hvilke produkter der opbevares i indk�bskurven, n�r du handler p� websitet.</p>

<p>Vi anvender Google Analytics til at se brugernes f�rden p� vores website, s� vi kan forbedre oplevelsen for alle brugere.</p>

<h3>Registrering</h3>
<p>For at du kan indg� en aftale med os via websitet skal du lade dig registrere med navn, adresse, telefonnummer og email-adresse. Personoplysningerne registreres hos Discimport.dk. Vi foretager udelukkende registreringen af dine personoplysninger med det form�l at kunne levere varen til dig.</p>

<p>Vi registrerer desuden relevante data vedr�rende k�bet, for senere at kunne finde kundens faktura med fx serienumre p� varer.</p>

<p>Oplysningerne videregives ikke til tredjemand.</p>

<p>Som registreret hos Discimport.dk har du altid ret til at g�re indsigelse mod registreringen og du har ret til indsigt i hvilke oplysninger, der er registreret om dig. Disse rettigheder har du efter persondataloven og henvendelse i forbindelse hermed rettes til Discimport.dk via e-mail.</p>

<!--
<p>Ved betalinger med betalingskort, sendes kortoplysninger krypteret til vores betalingsudbyder. stormagasinet har ikke adgang til dine kortoplysninger.
-->

');

echo $main->fetch('main-tpl.php');
?>