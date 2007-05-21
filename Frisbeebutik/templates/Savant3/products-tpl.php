<h1><?php echo $this->headline; ?></h1>

<?php if (is_array($this->products) AND count($this->products) > 0): ?>

<table summary="" id="products">

<?php foreach ($this->products AS $product): ?>
    <tr>
        <td>
        <?php if (array_key_exists(0, $product['pictures'])): ?>
            <img src="<?php echo $product['pictures'][0]['thumbnail']['file_uri']; ?>" alt="<?php $product['name'] ?>" height="<?php echo $product['pictures'][0]['thumbnail']['height']; ?>" width="<?php echo $product['pictures'][0]['thumbnail']['width']; ?>" />
        <?php endif; ?>
      </td>
        <td>
            <a href="product.php?id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a>
        </td>
        <td nowrap="nowrap">
            <?php echo $product['price_incl_vat'] ?> kr
        </td>
        <?php if ($product['stock_status']['for_sale'] > 0): ?>
        <td  nowrap="nowrap"><a class="buy" href="basket.php?add=<?php echo $product['id']; ?>&amp;q=<?php if (!empty($_GET['q'])) echo rawurlencode($_GET['q']); ?>">Køb</a></td>
        <?php else: ?>
        <td  nowrap="nowrap">Udsolgt</td>
        <?php endif; ?>
    </tr>
<?php endforeach; ?>

</table>

<p style="text-align: right;"><?php echo $this->paging; ?></p>

<?php else: ?>

    <?php if (!empty($no_results_msg)): ?>
        <p><?php echo $no_results_msg; ?></p>
    <?php endif; ?>

    <h2>Producenter</h2>
    <a href="products.php?q=discraft"><img src="/gfx/images/discraft.jpg" alt="" /></a>
    <a href="products.php?q=innova"><img src="/gfx/images/innova.jpg" alt="" /></a>
    <a href="products.php?q=ching"><img src="/gfx/images/ching.jpg" alt="" /></a>
    <a href="products.php?q=discwing"><img src="/gfx/images/discwing.jpg" alt="" /></a>

    <h2>Typer</h2>
    <a href="products.php?q=collectors"><img src="/gfx/images/collector.jpg" alt="" /></a>
    <a href="products.php?q=driver"><img src="/gfx/images/driver.jpg" alt="" /></a>
    <a href="products.php?q=putter"><img src="/gfx/images/putter.jpg" alt="" /></a>
    <a href="products.php?q=kurve"><img src="/gfx/images/kurve.jpg" alt="" /></a>
    <a href="products.php?q=præmier"><img src="/gfx/images/praemier.jpg" alt="" /></a>
    <a href="products.php?q=rekreation"><img src="/gfx/images/rekreation.jpg" alt="" /></a>
    <a href="products.php?q=ultimate"><img src="/gfx/images/ultimate.jpg" alt="" /></a>

<?php endif; ?>