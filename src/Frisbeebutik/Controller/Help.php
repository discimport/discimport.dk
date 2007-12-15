<?php
class Frisbeebutik_Controller_Help extends k_Controller
{
    function GET()
    {
        return '
<h1>Hjælp!</h1>

<h4>Hvordan bestiller jeg varer?</h4>

<ol>
    <li>Find den ønskede vare.</li>
    <li>Når varen er fundet, klikker du på Køb. Du har altid mulighed for at ændre antallet inde fra indkøbskurven. Du kan også fjerne varen ved at skrive nul.</li>
    <li>Når din indkøbskurv ser ud, som du gerne vil have det, skal du gå til kassen.</li>
    <li>Ved kassen indtaster du adresseoplysninger og klikker køb. Alle felter skal udfyldes.</li>
</ol>

<h4>Hvordan kan jeg betale mine varer ?</h4>
<p>Se <a href="'.$this->url('/handelsbetingelser').'">handelsbetingelserne</a>.</p>

        ';
    }
}
