
	<div class="row mt-5">

		<div class="col-7" style="text-align: center;">

		<?php 

		$order_data = file_get_contents('database/cart.txt');

		//echo $order_data;

		$order = json_decode($order_data, TRUE);
	

		// json_encode => array to JSON

		// json_decode => JSON to array

		echo '<pre>'; print_r($order); echo '</pre>';


		?>


		<?php

		if (isset($_GET['delete'])) {
		unset($order[$_GET['delete']]);
		$json = json_encode($order);
		file_put_contents('database/cart.txt', $json);

		header("Location: ?page=cart");
}

?>
		<h3>Cart:</h3>
		<?php foreach($order as $key=>$item):?>

		<div class="card">

		 <div class="row">

		 	<div class="col-4">
		 		<img src="<?php echo $products[$item]['image'];?>" style="width: 100px;">
		 	</div>

		 	<div class="col-6">
		 		<h5><?php echo $products[$item]['title'];?></h5>
		 
		 		<h5><?php echo $products[$item]['price'];?></h5>
		 	</div>

		 	<div class="col-2">
		 		<a href="?page=cart&delete=<?php echo $key;?>">
		 		delete
		 		</a>
		 	</div>
		 	
		 </div>
			
			
		</div>
		
		<?php endforeach;?>
		</div>
		
		<div class="col-5">
			
		</div>
		</div>
			


