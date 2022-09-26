<?php 

	$users = file_get_contents('manager/users.txt');

	$user_array = json_decode($users, true);

	//echo '<pre>'; print_r($user_array); echo '</pre>';
?>

<?php 

if (isset($_GET['delete'])) {
	unset($user_array[$_GET['delete']]);

	$json = json_encode($user_array);
	file_put_contents('manager/users.txt', $json);
	header("Location: index.php");
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
		<a href="index.php"> Ortga </a>
		</div>
	</div>
		
	<div class="row">
		<h3> Ro'yxatdan o'tish </h3>

	<form method="POST" class="mb-5 form-control">
		
		<label> Ism </label>
		<input class="form-control" type="text" name="ism" required>

		<label> Familiyasi </label>
		<input class="form-control" type="text" name="familiya" required>

		<label> Telefon raqami </label>
		<input class="form-control" type="text" name="telefon" required>

		<label> Login </label>
		<input class="form-control" type="text" name="login" required>

		<label> Parol </label>
		<input class="form-control" type="text" name="parol" required>

		<button class="btn btn-primary mt-3" type="submit" name="add_user"> Qo'shish </button>

	</form>

	</div>
	

	<?php 

	//echo '<pre>'; print_r($_POST); echo '</pre>';

	if (isset($_POST['add_user'])) {

		$user_data = file_get_contents('manager/users.txt');

		$user_array = json_decode($user_data, true);

		$user_array[] = $_POST;

		$json = json_encode($user_array);

		file_put_contents('manager/users.txt', $json);

		header("Location: index.php");
		
	}

	?>

	


	</div>
</body>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</html>