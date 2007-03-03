<?php
$product = $this->product;
?>

<div class="vare">
	<?php if (array_key_exists(0, $product['pictures'])) { ?>
	<img src="<?php echo $product['pictures'][0]['medium']['file_uri']; ?>" alt="<?php $product['name'] ?>" width="<?php echo $product['pictures'][0]['medium']['width']; ?>" height="<?php echo $product['pictures'][0]['medium']['height']; ?>" />
	<?php } ?>
	<h1><?php echo $product['name']; ?></h1>
	<p><?php echo nl2br($product['description']); ?></p>
	<p><?php echo $product['price_incl_vat'] ?> kr</p>
	<?php if ($product['stock_status']['for_sale'] > 0): ?>
		<p><a class="buy" href="basket.php?add=<?php echo $product['id']; ?>&amp;id=<?php echo $_GET['id']; ?>">Køb</a></p>
	<?php else: ?>
		<p style="color: red">Produktet er udsolgt</p>
	<?php endif; ?>
</div>


<?php if (is_array($related_products) AND count($related_products) > 0): ?>
	<h3>Relaterede produkter</h3>
	<ul>
		<?php foreach($related_products AS $key=>$value): ?>
		<li><a href="product.php?id=<?php echo $value['id']; ?>"><?php echo $value['name']; ?></a></li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>
