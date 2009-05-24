<?php 
include('../../include/include_webshop.php');



$client = new WebshopClient;

if (!empty($_POST['bestil'])) {
		$order['company'] = "Kontantsalg";
		$order['contactname'] = "Mikael Johansen";
		$order['address'] = 'Ingen';
		$order['postalcode'] = '8000';
		$order['town'] = 'Århus C';
		$order['email'] = '';
		$order['phone'] = '';		

		$client->placeOrder($order);
		
		header("Location: index.php?msg=" . urlencode('Ordren er lagt ind i systemet.'));
		exit;
}

if(!empty($_POST['update']) AND is_array($_POST['quantity'])) {		
  foreach($_POST['quantity'] as $key => $antal) {
		$client->changeBasket($key, $antal);  
  }
}

?>
<h1>Ordre</h1>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<table>
  	<caption>Kurv</caption>
		<?php
			foreach($client->getItems() AS $item) { ?>
				<tr>
      	<td><input type="text" size="2" value="<?php echo $item["quantity"]; ?>" name="quantity[<?php echo $item["id"]; ?>]" /></td>
       <td><?php echo $item["name"]; ?></td>
      </tr>
		<?php	
     }
		?>
	</table>
	<p><input name="update" value="Opdater" type="submit" /> <input name="bestil" type="submit" value="Bestil" /></p>
</form>

	<p><a href="index.php">Find flere varer</a></p>


