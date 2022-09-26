
	<div class="row mt-5">

		<div class="col-7" style="text-align: center;">

		<?php 

		$order_data = file_get_contents('database/order.txt');

		//echo $order_data;

		$order = json_decode($order_data, TRUE);

		// json_encode => array to JSON

		// json_decode => JSON to array

		//echo '<pre>'; print_r($order); echo '</pre>';


		?>

		<?php foreach($order as $item):?>

		<div class="card">
		<?php echo $products[$item['product_id']]['title'];?>
		<h5><?php echo $item['customer_name'];?></h5>
		<h5><?php echo $item['customer_surname'];?></h5>
		<h5><?php echo $item['customer_address'];?></h5>
		<h5><?php echo $item['customer_phone'];?></h5>
		</div>

		<?php endforeach;?>
		</div>
		
		<div class="col-5">
			
		</div>
		</div>
			
		</div>
	</div>

