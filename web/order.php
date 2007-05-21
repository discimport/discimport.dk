<?php
require 'include_shop.php';
require 'HTML/QuickForm.php';
require 'IntrafacePublic/Shop/XMLRPC/Client.php';
require 'Frisbeebutik/Frontend.php';

$debug = false;
$client = new IntrafacePublic_Shop_XMLRPC_Client($credentials, $debug, PATH_XMLRPC . 'shop/server3.php');

$form = new HTML_QuickForm();

$renderer = $form->defaultRenderer();
$renderer->setRequiredNoteTemplate('<tr><td><span>* skal udfyldes</span></td></tr>');

$form->addElement('text', 'name', 'Navn');
$form->addElement('text', 'contactperson', 'Kontaktperson');
$form->addElement('text', 'address', 'Adresse');
$form->addElement('text', 'postcode', 'Postnr.');
$form->addElement('text', 'city', 'By');
$form->addElement('text', 'email', 'E-mail');
$form->addElement('text', 'phone', 'Telefon');
$form->addElement('checkbox', 'handelsbetingelser', 'Accepterer du handelsbetingelserne?');
$form->addElement('submit','send','Send');

$form->applyFilter('__ALL__', 'trim');

$form->addRule('name', 'Skriv venligst dit navn', 'required', null);
$form->addRule('address', 'Skriv venligst din adresse', 'required', null);
$form->addRule('postcode', 'Skriv venligst dit postnummer', 'required', null);
$form->addRule('city', 'Skriv venligst din by', 'required', null);
$form->addRule('email', 'Skriv venligst din e-mail', 'required', null);
$form->addRule('handelsbetingelser', 'Du skal acceptere handelsbetingelserne', 'required', null);

$main = new Frisbeebutik_Frontend;
$main->assign('title', 'Bestil');
$main->assign('description', '');
$main->assign('keywords', '');

if ($form->validate()) {
    $values = $form->exportValues();
    if ($client->placeOrder($values)) {
        header('Location: confirm.php');
        exit;
    }
    else {
        $main->assign('content_main', 'Bestillingen blev ikke afsendt. Du bliver nødt til at ringe til os, for der er åbenbart problemer med butikken.');
    }
}
else {
    $main->assign('content_main', '<h1>Adresseoplysninger</h1><p>Trin 2 af 3</p>' . $form->toHtml());
}

$main->display('main-tpl.php');
?>