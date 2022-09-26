<?php 

	$product_data = file_get_contents('../database/product.txt');

	$product_array = json_decode($product_data, true);

	$product = $product_array[$_GET['product_id']];

	echo '<pre>'; print_r($product); echo '</pre>';
?>

<?php 

if (isset($_GET['delete'])) {
	unset($product_array[$_GET['delete']]);

	$json = json_encode($product_array);
	file_put_contents('../database/product.txt', $json);
	header("Location: index.php?page=product");
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>

	<div class="container">

	<div class="row">

		<div class="col">
		<a href="?page=product">	Ortga </a>
		</div>
	</div>
		
	<div class="row">
		<h3> Product edit </h3>

	<form method="POST" class="mb-5 form-control">
		
		<label> Title </label>
		<input value="<?php echo $product['title'];?>" class="form-control" type="text" name="title" required>

		<label> Opisanie </label>
		<textarea class="form-control" name="opisanie" required>
			<?php echo $product['opisanie'];?>
		</textarea> 

		<label> Image </label>
		<input value="<?php echo $product['image'];?>" class="form-control" type="text" name="image" required>

		<label> Price </label>
		<input value="<?php echo $product['price'];?>" class="form-control" type="number" name="price" required>

		<button class="btn btn-primary mt-3" type="submit" name="edit_product"> Edit </button>

	</form>

	</div>
	

	<?php 

	//echo '<pre>'; print_r($_POST); echo '</pre>';

	if (isset($_POST['edit_product'])) {

		$product_data = file_get_contents('../database/product.txt');

		$product_array = json_decode($product_data, true);

		$product_array[$_GET['product_id']] = $_POST;

		$json = json_encode($product_array);

		file_put_contents('../database/product.txt', $json);

		header("Location: index.php?page=product");
		
	}

	?>


	</div>
</body>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</html>