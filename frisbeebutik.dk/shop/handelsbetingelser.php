<?php
require('include_webshop.php');

# viser html på frisbeebutik.dk
$main = new Template(PATH_TEMPLATE);
$main->set('title', 'Discimport.dk');
$main->set('description', '');
$main->set('keywords', '');
$main->set('content_main', '
<h1>Salgs- og leveringsbetingelser</h1>  	

<h2>Generelt</h2>
<p>Nedenstående salgs- og leveringsbetingelser gælder for alle handler indgået med Discimport.dk.</p>

<h2>Priser</h2>

<p>Alle priser på hjemmesiden er kontante enhedspriser inkl. moms. Discimport.dk forbeholder sig ret til at ændre priser uden varsel.</p>

<h2>Bestilling</h2>

<p>Alle varer kan bestilles online i vores webshop.</p>

<p>Du er altid velkommen til at at sende en <a href="firmainfo.php">e-mail</a>, hvis du søger andre former for discs. Vi undersøger gerne muligheden for at bestille dem hjem.</p>

<p>Discimport.dk svarer gerne på henvendelser angående produkter og leveringstid inden køb.</p>

<h2>Betaling</h2>
<p>I vores webshop kan du betale med følgende betalingsmidler:</p>

<ul>
	<li>Bankoverførsel</li>
</ul>

<!--
Data du sender i forbindelse med køb betalt med betalingskort er krypterede (SSL), og det er således kun PBS, der kan læse dem. Hverken stormagasinet eller andre har mulighed for at læse dataene.

Betales med betalingskort er du altid sikret mod misbrug. Du har nemlig mulighed for at afvise en betaling, når du modtager din betalingsoversigt. Du har ingen selvrisiko i tilfælde af, at dit kort bliver misbrugt i en internetbutik, der benytter SSL (Secure Socket Layer) i sit betalingssystem. Dermed er du bedre sikret end i den fysiske verden, hvor du har en selvrisiko på 1.200,- kr. når dit Dankort misbruges ved brug af pin-koden.

Beløbet for varerne trækkes først, når varerne sendes fra stormagasinet. Der kan aldrig trækkes et større beløb, end det du har godkendt ved købet.
-->

<h2>Levering</h2>
<p>Discimport.dk sender med PostDanmark over hele Danmark (eksl. Grønland og Færøerne).</p>

<p>Alle ordrer leveres inden for 3-10 hverdage, medmindre andet fremgår under beskrivelsen af det enkelte produkt. Der tages imidlertid forbehold for udsolgte og udgåede varer samt forlænget leveringstid og leveringssvigt af varer fra vores leverandører.</p>

<h2>Reklamationsret</h2>

<p>Du har efter købeloven reklamationsret i 24 måneder på alle varer. Reklamationsretten betyder, at du som kunde kan klage over fejl og mangler ved produktet som er opstået 24 måneder efter købet. Der er ingen reklamationsret på discs, som er gået i stykker på grund af slid eller forkert behandling. Knækkede discs byttes som hovedregel ikke.</p>

<p>Sender du discs tilbage, skal udførlig fejlbeskrivelse samt kopi af faktura medsendes. Discimport.dk forbeholder sig ret til at kreditere varen til dens oprindelige pris.</p>

<p>Inden returnering af varer til Discimport.dk skal der rettes henvendelse til Discimport.dk med henblik på rekvirering af returnummer.</p>

<p>Returvarer sendes til <a href="firmainfo.php">vores adresse</a>. Returnummer skal anføres på pakken. Uforsvarlig forsendelse vil medføre bortfald af reklamationsret samt returnering for egen regning.</p>

<p>Discimport.dk er uden ansvar for enhver forsinkelse som følge af afhjælpningen eller ombytningen.</p>

<h2>Returret</h2>

<p>Discimport.dk yder 14 dages returret fra den dag varen modtages. Returnering sker for kundens regning.</p>

<p>For at udnytte returretten, skal varen returneres i samme stand som den blev modtaget. Da varens emballage repræsenterer en værdi ifbm. gensalg af varen, bedes varen returneret i den emballage du modtog varen i.</p>

<p>Uforsvarlig forsendelse vil medføre bortfald af returret samt genlevering for egen regning.</p>

<p>Returvarer sendes til <a href="firmainfo.php">vores adresse</a>.</p>

<p>Du kan returnere varen til os ved at nægte at modtage varen når den leveres.</p>

<p>Når vi har modtaget varen retur og kontrolleret, at den lever op til betingelserne for at fortrydelsesretten kan udnyttes, tilbagebetales den totale købesum til dig ved en overførsel til din bank. Det vil lette vores ekspedition, hvis du samtidigt sender os oplysninger om dit pengeinstitut. Vi skal bruge følgende oplysninger: Bankens navn, bankens registreringsnummer (4 cifre) samt dit kontonummer (10 cifre).</p>

<h2>E-markedsføring</h2>

<p>Der udsendes ingen e-mail-reklamer eller lignende fra Discimport.dk uden dit udtrykkelige/aktive samtykke hertil (f.eks. nyhedsbrevet).</p>

<h2>Persondatapolitik</h2>

<h3>Cookies</h2>

<p>En cookie er en betegnelse for det forhold, at en brugers adfærd på et netværk registreres hos brugeren selv (på brugerens harddisk). På den måde ved serveren (fx. et websted) ved brugerens næste besøg, hvem brugeren er. Der lagres ikke personhenførbare oplysninger i en cookie, men snarere oplysninger om brugerens adfærd på et website fx. et indtastet brugernavn i forbindelse med login til en særlig sektion på webstedet. En cookie lagres på brugens harddisk sammen med cachede filer. En cookie er således en tekstfil, der sendes til din browser fra en webserver og lagres på din computers harddisk. Du kan sætte din browser til at informere dig, når du modtager en cookie, eller du kan vælge at slå cookies helt fra.</p>

<p>På Discimport.dk anvendes cookies med det formål at optimere websitet og dets funktionaliteter. Cookies bruges på til at huske hvilke produkter der opbevares i indkøbskurven, når du handler på websitet.</p>

<p>Vi anvender Google Analytics til at se brugernes færden på vores website, så vi kan forbedre oplevelsen for alle brugere.</p>

<h3>Registrering</h3>
<p>For at du kan indgå en aftale med os via websitet skal du lade dig registrere med navn, adresse, telefonnummer og email-adresse. Personoplysningerne registreres hos Discimport.dk. Vi foretager udelukkende registreringen af dine personoplysninger med det formål at kunne levere varen til dig.</p>

<p>Vi registrerer desuden relevante data vedrørende købet, for senere at kunne finde kundens faktura med fx serienumre på varer.</p>

<p>Oplysningerne videregives ikke til tredjemand.</p>

<p>Som registreret hos Discimport.dk har du altid ret til at gøre indsigelse mod registreringen og du har ret til indsigt i hvilke oplysninger, der er registreret om dig. Disse rettigheder har du efter persondataloven og henvendelse i forbindelse hermed rettes til Discimport.dk via e-mail.</p>

<!--
<p>Ved betalinger med betalingskort, sendes kortoplysninger krypteret til vores betalingsudbyder. stormagasinet har ikke adgang til dine kortoplysninger.
-->

');

echo $main->fetch('main-tpl.php');
?>