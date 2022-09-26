<?php 

	$product = file_get_contents('../database/product.txt');

	$product_array = json_decode($product, true);

	//echo '<pre>'; print_r($user_array); echo '</pre>';
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
			<a href="?page=users">Foydalanuvchi qoshish</a>
		</div>

		<div class="col">
		<a href="?logout_admin">	Chiqish </a>
		</div>
	</div>
		
	<div class="row">
		<h3> Product qo'shish </h3>

	<form method="POST" class="mb-5 form-control">
		
		<label> Title </label>
		<input class="form-control" type="text" name="title" required>

		<label> Opisanie </label>
		<textarea class="form-control" name="opisanie" required>
			
		</textarea> 

		<label> Image </label>
		<input class="form-control" type="text" name="image" required>

		<label> Price </label>
		<input class="form-control" type="number" name="price" required>

		<label> Category </label>
		<select class="form-control"  name="category" required>
			<option> Men Clothes </option>
			<option> Women Clothes </option>
			<option> Electronics </option>
			<option> Kids Clothes </option>
		</select>

		<button class="btn btn-primary mt-3" type="submit" name="add_product"> Qo'shish </button>

	</form>

	</div>
	

	<?php 

	//echo '<pre>'; print_r($_POST); echo '</pre>';

	if (isset($_POST['add_product'])) {

		$product_data = file_get_contents('../database/product.txt');

		$product_array = json_decode($product_data, true);

		$product_array[] = $_POST;

		$json = json_encode($product_array);

		file_put_contents('../database/product.txt', $json);

		header("Location: index.php?page=product");
		
	}

	?>

<table class="table">
	<thead>
		<tr>
			<th scope="col"> Title </th>
			<th scope="col"> Opisanie </th>
			<th scope="col"> Image </th>
			<th scope="col"> Price </th>
			<th scope="col"> </th>
		</tr>
	</thead>
	<tbody>
		
		<?php foreach($product_array as $key=>$product): ?>
		<tr>
			<td> <?php echo $product['title'];?> </td>
			<td> <?php echo $product['opisanie'];?> </td>
			<td> <img src="<?php echo $product['image'];?>" width="100"> </td>
			<td> <?php echo $product['price'];?> </td>
			<td> 
				<a href="?page=product_edit&product_id=<?php echo $key;?>">
					<button class="btn btn-primary btn-sm">Edit</button>
				</a>
				<a href="?page=product&delete=<?php echo $key;?>">
					<button class="btn btn-danger btn-sm">Delete</button>
				</a> 
			</td>
		</tr>
		<?php endforeach;?>

	</tbody>
</table>
	


	</div>
</body>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</html>