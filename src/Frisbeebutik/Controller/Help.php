<?php
class Frisbeebutik_Controller_Help extends k_Controller
{
    function GET()
    {
        return '
<h1>Hj�lp!</h1>

<h4>Hvordan bestiller jeg varer?</h4>

<ol>
    <li>Find den �nskede vare.</li>
    <li>N�r varen er fundet, klikker du p� K�b. Du har altid mulighed for at �ndre antallet inde fra indk�bskurven. Du kan ogs� fjerne varen ved at skrive nul.</li>
    <li>N�r din indk�bskurv ser ud, som du gerne vil have det, skal du g� til kassen.</li>
    <li>Ved kassen indtaster du adresseoplysninger og klikker k�b. Alle felter skal udfyldes.</li>
</ol>

<h4>Hvordan kan jeg betale mine varer ?</h4>
<p>Se <a href="'.$this->url('/handelsbetingelser').'">handelsbetingelserne</a>.</p>

        ';
    }
}
