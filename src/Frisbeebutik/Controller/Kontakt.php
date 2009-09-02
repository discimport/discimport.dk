<?php
class Frisbeebutik_Controller_Kontakt extends k_Controller
{
    function GET()
    {
        return '
<h2>Firmaoplysninger</h2>

<p>Webshoppen ejes og drives af:</p>

<p class="vcard">
<span class="fn">Discimport.dk</span>
<span class="address">
co/ Mikael Birkelund Jensen-Johansen<br />
Søvej 12<br />
7362 Hampen</span>
<br />Telefon: <span class="tel">51 92 40 93</span>
<br />E-mail: <span class="email">mikael@discimport.dk</span>
<br />SE/CVR Nr.: 28 37 03 18
<br /><a href="http://www.discimport.dk/" class="url">www.discimport.dk</a>
</p>

<h2>Virksomhedsform</h2>
<p>Discimport.dk er et interessentselskab, etableret i 2005, men vi har solgt discs gennem Fodboldens Legestue siden 1999.</p>

<h2>Bemærk venligst</h2>

<p>Discimport.dk driver udelukkende internetvirksomhed, hvorfor der ikke er mulighed for personlig betjening på adressen uden forudgående aftale.</p>
        ';
    }
}
