<h1>Indkøbskurv</h1>

<?php if (is_array($this->items) AND count($this->items) > 0): ?>

<p>Trin 1 af 3</p>

<?php if (is_array($this->error)) echo implode($this->error, ', ') ?>

<form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="post">
	<table id="kurv">
		<caption>Kurv (priser incl. moms)</caption>
		<thead>
			<tr>
				<th></th>
				<th>Navn</th>
				<th>Antal</th>
				<th>Beløb</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td class="help" colspan="2">Du kan ændre antallet af varer ved at rette antallet og opdatere kurven.</td>
				<td class="total"><strong>I alt</strong></td>
				<td class="total" style="text-align: right;">DKK <?php echo $total_price; ?></td>
			</tr>
		</tfoot>

		<tbody>
		<?php foreach($this->items AS $item): ?>
			<tr>
				<td>
					<?php if (array_key_exists(0, $item['pictures'])): ?>
						<img src="<?php echo $item['pictures'][0]['thumbnail']['file_uri']; ?>" alt="<?php echo $item["name"]; ?>" height="<?php echo $item['pictures'][0]['thumbnail']['height']; ?>" width="<?php echo $item['pictures'][0]['thumbnail']['width']; ?>" />
					<?php endif; ?>
				</td>
				<td>
				<?php
					echo $item["name"];
					if ($item["id"] == $porto_produkt_id) {
						echo ' (' .$weight . ' g)';
					}
				?>
				</td>
				<td>
				<?php
					if ($item["id"] == $porto_produkt_id OR $item["id"] == $rabat_produkt_id) {
					}
					else {
						echo '<input type="text" size="2" value="'.$item["quantity"].'" name="quantity['.$item["id"].']" />';
					}
				?>
				</td>
				<td style="text-align: right;">DKK <?php echo $item["totalprice_incl_vat"]; ?></td>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
</table>

<p style="text-align: right;">
<input name="update" value="Opdater kurv" type="submit" />
</p>

<p>
	<a href="products.php">Fortsæt indkøb</a>
	<a class="buy" href="order.php" onclick="javascript:urchinTracker('/shop/continue');">Til kassen</a>
</p>


</form>


<?php else: ?>

	<p>Der er ikke nogen varer i indkøbskurven. <a href="products.php">Gå til oversigten &rarr;</a></p>

<?php endif; ?>
