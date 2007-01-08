<?php if (is_array($products) AND count($products) > 0): ?>

<?php foreach ($products AS $product): ?>
		<?php if (!array_key_exists(0, $product['pictures'])) continue; ?>
		<?php if ($product['stock_status']['for_sale'] == 0) continue; ?>

	<div class="product-feature">
		<a href="product.php?id=<?php echo $product['id']; ?>"><img src="<?php echo $product['pictures'][0]['small']['file_uri']; ?>" alt="<?php $product['name'] ?>" height="<?php echo $product['pictures'][0]['small']['height']; ?>" width="<?php echo $product['pictures'][0]['small']['width']; ?>" /></a>
		<br />DKK <?php echo number_format($product['price_incl_vat'], 2, ',', '.'); ?> <a class="buy" href="basket.php?add=<?php echo $product['id']; ?>&amp;q=<?php echo $_GET['q']; ?>">Køb</a>

	</div>
<?php	endforeach; ?>

<?php endif; ?>