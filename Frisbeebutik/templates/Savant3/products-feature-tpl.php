<?php if (is_array($this->products) AND count($this->products) > 0): ?>
<h3 style="clear: both;"><?php echo $this->headline; ?></h3>

<?php foreach ($this->products AS $product): ?>
    <?php if (!array_key_exists(0, $product['pictures'])) continue; ?>
    <?php if ($product['stock_status']['for_sale'] == 0) continue; ?>

    <div class="product-feature">
        <a href="product.php?id=<?php echo $product['id']; ?>"><img src="<?php echo $product['pictures'][0]['small']['file_uri']; ?>" alt="<?php $product['name'] ?>" height="<?php echo $product['pictures'][0]['small']['height']; ?>" width="<?php echo $product['pictures'][0]['small']['width']; ?>" /></a>
        <br />DKK <?php echo number_format($product['price_incl_vat'], 2, ',', '.'); ?> <a class="buy" href="basket.php?add=<?php echo $product['id']; ?>">K�b</a>

    </div>
<?php endforeach; ?>

<?php endif; ?>