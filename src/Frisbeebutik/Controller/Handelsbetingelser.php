<?php
class Frisbeebutik_Controller_Handelsbetingelser extends k_Controller
{
    function GET()
    {
        return '
<h2>Salgs- og leveringsbetingelser</h2>

<h3>Generelt</h3>
<p>Nedenst�ende salgs- og leveringsbetingelser g�lder for alle handler indg�et med Discimport.dk.</p>

<h3>Priser</h3>

<p>Alle priser p� hjemmesiden er kontante enhedspriser inkl. moms. Discimport.dk forbeholder sig ret til at �ndre priser uden varsel.</p>

<h3>Bestilling</h3>

<p>Alle varer kan bestilles online i vores webshop.</p>

<p>Du er altid velkommen til at at sende en <a href="'.$this->url('/kontakt').'">e-mail</a>, hvis du s�ger andre former for discs. Vi unders�ger gerne muligheden for at bestille dem hjem.</p>

<p>Discimport.dk svarer gerne p� henvendelser ang�ende produkter og leveringstid inden k�b.</p>

<h3>Betaling</h3>
<p>I vores webshop kan du betale med f�lgende betalingsmidler:</p>

<ul>
    <li>Bankoverf�rsel</li>
    <li>Dankort og visakort</li>
</ul>

<p>Data du sender i forbindelse med k�b betalt med betalingskort er krypterede (SSL), og det er s�ledes kun PBS, der kan l�se dem. Hverken stormagasinet eller andre har mulighed for at l�se dataene.</p>

<p>Bel�bet for varerne tr�kkes f�rst, n�r varerne sendes. Der kan aldrig tr�kkes et st�rre bel�b, end det du har godkendt ved k�bet.</p>

<h3>Levering</h3>
<p>Discimport.dk sender med PostDanmark over hele Danmark (eksl. Gr�nland og F�r�erne).</p>

<p>Alle ordrer leveres inden for 3-10 hverdage, medmindre andet fremg�r under beskrivelsen af det enkelte produkt. Der tages imidlertid forbehold for udsolgte og udg�ede varer samt forl�nget leveringstid og leveringssvigt af varer fra vores leverand�rer.</p>

<h3>Reklamationsret</h3>

<p>Du har efter k�beloven reklamationsret i 24 m�neder p� alle varer. Reklamationsretten betyder, at du som kunde kan klage over fejl og mangler ved produktet som er opst�et 24 m�neder efter k�bet. Der er ingen reklamationsret p� discs, som er g�et i stykker p� grund af slid eller forkert behandling. Kn�kkede discs byttes som hovedregel ikke.</p>

<p>Sender du discs tilbage, skal udf�rlig fejlbeskrivelse samt kopi af faktura medsendes. Discimport.dk forbeholder sig ret til at kreditere varen til dens oprindelige pris.</p>

<p>Inden returnering af varer til Discimport.dk skal der rettes henvendelse til Discimport.dk med henblik p� rekvirering af returnummer.</p>

<p>Returvarer sendes til <a href="'.$this->url('/kontakt').'">vores adresse</a>. Returnummer skal anf�res p� pakken. Uforsvarlig forsendelse vil medf�re bortfald af reklamationsret samt returnering for egen regning.</p>

<p>Discimport.dk er uden ansvar for enhver forsinkelse som f�lge af afhj�lpningen eller ombytningen.</p>

<h3>Returret</h3>

<p>Discimport.dk yder 14 dages returret fra den dag varen modtages. Returnering sker for kundens regning.</p>

<p>For at udnytte returretten, skal varen returneres i samme stand som den blev modtaget. Da varens emballage repr�senterer en v�rdi ifbm. gensalg af varen, bedes varen returneret i den emballage du modtog varen i.</p>

<p>Uforsvarlig forsendelse vil medf�re bortfald af returret samt genlevering for egen regning.</p>

<p>Returvarer sendes til <a href="'.$this->url('/kontakt').'">vores adresse</a>.</p>

<p>Du kan returnere varen til os ved at n�gte at modtage varen n�r den leveres.</p>

<p>N�r vi har modtaget varen retur og kontrolleret, at den lever op til betingelserne for at fortrydelsesretten kan udnyttes, tilbagebetales den totale k�besum til dig ved en overf�rsel til din bank. Det vil lette vores ekspedition, hvis du samtidigt sender os oplysninger om dit pengeinstitut. Vi skal bruge f�lgende oplysninger: Bankens navn, bankens registreringsnummer (4 cifre) samt dit kontonummer (10 cifre).</p>

<h3>E-markedsf�ring</h3>

<p>Der udsendes ingen e-mail-reklamer eller lignende fra Discimport.dk uden dit udtrykkelige/aktive samtykke hertil (f.eks. nyhedsbrevet).</p>

<h3>Persondatapolitik</h3>

<h4>Cookies</h4>

<p>En cookie er en betegnelse for det forhold, at en brugers adf�rd p� et netv�rk registreres hos brugeren selv (p� brugerens harddisk). P� den m�de ved serveren (fx. et websted) ved brugerens n�ste bes�g, hvem brugeren er. Der lagres ikke personhenf�rbare oplysninger i en cookie, men snarere oplysninger om brugerens adf�rd p� et website fx. et indtastet brugernavn i forbindelse med login til en s�rlig sektion p� webstedet. En cookie lagres p� brugens harddisk sammen med cachede filer. En cookie er s�ledes en tekstfil, der sendes til din browser fra en webserver og lagres p� din computers harddisk. Du kan s�tte din browser til at informere dig, n�r du modtager en cookie, eller du kan v�lge at sl� cookies helt fra.</p>

<p>P� Discimport.dk anvendes cookies med det form�l at optimere websitet og dets funktionaliteter. Cookies bruges til at huske hvilke produkter der opbevares i indk�bskurven, n�r du handler p� websitet.</p>

<p>Vi anvender Google Analytics til at se brugernes f�rden p� vores website, s� vi kan forbedre oplevelsen for alle brugere.</p>

<h4>Registrering</h4>
<p>For at du kan indg� en aftale med os via websitet skal du lade dig registrere med navn, adresse, telefonnummer og email-adresse. Personoplysningerne registreres hos Discimport.dk. Vi foretager udelukkende registreringen af dine personoplysninger med det form�l at kunne levere varen til dig.</p>

<p>Vi registrerer desuden relevante data vedr�rende k�bet, for senere at kunne finde kundens faktura med fx serienumre p� varer.</p>

<p>Oplysningerne videregives ikke til tredjemand.</p>

<p>Som registreret hos Discimport.dk har du altid ret til at g�re indsigelse mod registreringen og du har ret til indsigt i hvilke oplysninger, der er registreret om dig. Disse rettigheder har du efter persondataloven og henvendelse i forbindelse hermed rettes til Discimport.dk via e-mail.</p>

<!--
<p>Ved betalinger med betalingskort, sendes kortoplysninger krypteret til vores betalingsudbyder. stormagasinet har ikke adgang til dine kortoplysninger.
-->

        ';
    }
}
