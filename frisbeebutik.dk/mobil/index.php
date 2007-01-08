<?php 
include('../../include/include_webshop.php');

$client = new WebshopClient(false);

if (isset($_GET['add']) AND is_numeric($_GET['add'])) {
	$client->addBasket($_GET['add']);
}

?>
<h1>Lager</h1>

<?php if (!empty($_GET['msg'])) echo $_GET['msg']; ?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
	<fieldset>
		<legend>Søgefelt</legend>
		<input type="text" name="search" value="<?php echo $_GET['search']; ?>" /> <input type="submit" value="Søg" />
	</fieldset>
</form>

<?php if (!empty($_GET['search'])) { ?>

<?php 
	$products = $client->getProducts($_GET['search']); 
	foreach ($products AS $product) { ?>
		<p><?php echo $product['name']; ?><br />
		Lager: <?php echo $product['actual_stock']; ?>; pris: <?php echo $product['price_incl_vat']; ?> kr 
    <a href="?add=<?php echo $product['id'] . '&amp;search=' . $_GET['search']; ?>">+</a></p>
<?php	} ?>


<?php } ?>

<p><a href="vis_ordre.php">Se ordren</a></p>
