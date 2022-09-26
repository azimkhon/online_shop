<?php

$_SESSION['page'][] = $_GET['product'];

if (isset($_GET['add_to_cart'])) {

	$cart_json = file_get_contents('database/cart.txt');

	$cart_array = json_decode($cart_json, true);

	$cart_array[] = $_GET['product'];

	$cart_json = json_encode($cart_array);

	file_put_contents('database/cart.txt', $cart_json);

	header("Location: ?page=product&product=".$_GET['product']);

}

?>


	<div class="row mt-5">
	
		<div class="col-7" style="text-align: center;">
			<img src="<?php echo $products[$_GET['product']]['image'];?>" alt="">
		</div>
		
		<div class="col-5">
			<h4><?php echo $products[$_GET['product']]['title'];?></h4>

			<p>
				<?php echo $products[$_GET['product']]['opisanie'];?>
			</p>
			
			<h4>$ <?php echo $products[$_GET['product']]['price'];?></h4>

			<div class="d-grid gap-2 d-md-block">

			  <a href="?page=product&product=<?php echo $_GET['product'];?>&add_to_cart">
			  		<button class="btn btn-secondary">Add to cart</button>
				</a>

			  <a href="?page=checkout&product=<?php echo $_GET['product'];?>">
			  		<button class="btn btn-primary">Buy now</button>
			</a>
			</div>
		</div>
			
		</div>
	</div>

