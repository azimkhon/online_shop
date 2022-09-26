

	<div class="row mt-5">

		<div class="col-6" style="text-align: center;">
			<img src="<?php echo $products[$_GET['product']]['image'];?>" alt="">
			<h4><?php echo $products[$_GET['product']]['title'];?></h4>

			<p>
				<?php echo $products[$_GET['product']]['opisanie'];?>
			</p>
			
			<h4><?php echo $products[$_GET['product']]['price'];?></h4>
		</div>
		
		<div class="col-6">
			
			<form method="POST">

			<input type="hidden" value="<?php echo $_GET['product'];?>" name="product_id">

			<label class="form-label">Name</label>
			<input class="form-control" type="text" name="customer_name">

			<label class="form-label">Surname</label>
			<input class="form-control" type="password" name="customer_surname">

			<label class="form-label">Address</label>
			<input class="form-control" type="number" name="customer_address">

			<label class="form-label">Phone</label>
			<input class="form-control" type="text" name="customer_phone">

			<button class="btn btn-primary mt-2" type="submit" name="checkout_button"> Buy </button>

			</form>


			<?php

			//echo '<pre>'; print_r($_POST); echo '</pre>';

			if (isset($_POST['checkout_button'])) {

				// order.txt -> JSON
				// JSON -> array
				// array[] = $_POST
				// array -> JSON
				// put -> order.txt

			$json = file_get_contents('database/order.txt');
			$array = json_decode($json, true);

			$array[] = $_POST;

			$json = json_encode($array);

			file_put_contents('database/order.txt', $json); 

			//echo '<pre>'; print_r($_POST); echo '</pre>';

			header("Location: index.php?acceptorder");
			}

			
			?>
		</div>
			
		</div>
	</div>

