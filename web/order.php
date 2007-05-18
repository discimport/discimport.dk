<?php
require '../include_webshop.php';
require 'HTML/QuickForm.php';

$options = array(
    'prefix' => 'basket.'
);

$basket_client = XML_RPC2_Client::create('http://www.intraface.dk/xmlrpc/webshop/server2.php', $options);


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

$form->applyFilter(_ALL_, 'trim');

$form->addRule('name', 'Skriv venligst dit navn', 'required', null);
$form->addRule('address', 'Skriv venligst din adresse', 'required', null);
$form->addRule('postcode', 'Skriv venligst dit postnummer', 'required', null);
$form->addRule('city', 'Skriv venligst din by', 'required', null);
$form->addRule('email', 'Skriv venligst din e-mail', 'required', null);
$form->addRule('handelsbetingelser', 'Du skal acceptere handelsbetingelserne', 'required', null);

$main = new Savant3();
$main->addPath('template', PATH_TEMPLATE);
$main->set('title', 'Bestil');
$main->set('description', '');
$main->set('keywords', '');

if ($form->validate()) {
	$values = array_map('utf8_encode', $_POST);
	if ($client->placeOrder($credentials, $values)) {
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

echo $main->fetch('main-tpl.php');

?>