
<?php 

$user_data = file_get_contents('manager/users.txt');

$user_array = json_decode($user_data, true);

$user = $user_array[$_SESSION['user_id']];

//print_r($_SESSION);

if (isset($_GET['acceptorder'])) {
	echo "<script> alert('Order has been accepted!'); </script>";
}

if (isset($_GET['logout'])) {
	session_destroy();
	header('Location: index.php');
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

	<link rel="stylesheet" href="style/style.css">
</head>

<body>

	<div class="container">
		
	<div class="row mt-2">

		<!-- Emmet -->
		<div class="col-2">
			<a href="index.php">
				<img src="https://st.aliexpress.ru/mixer-storage/homePage/snow-homepage/logo-aliexpress.svg" alt="Logo">
			</a>
		</div>

		<div class="col-4">
			<form>
				<div class="input-group">
				  <span class="input-group-text" id="basic-addon1">
				  	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
					  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
					</svg>
				  </span>
				  <input type="text" name="search" class="form-control" placeholder="Search on AliExpress" value="<?php echo $_GET['search'];?>" aria-label="Username" aria-describedby="basic-addon1">
				</div>
			</form>
		</div>

		<div class="col-2">
		<?php 
			echo 'Salom, '.$user['ism'];
		?>
		</div>

		<div class="col-1">
			<a href="?page=profile">
			Profile
			</a>
		</div>

		<div class="col-1">
			<a href="?page=order">
			Orders
			</a>
		</div>

		<?php

		$cart_data = file_get_contents('database/cart.txt');

		$cart_array = json_decode($cart_data, true);
		?>

		<div class="col-1">
			<a href="?page=cart">
			Cart (<?php echo count($cart_array);?>)
			</a>
		</div>


		<div class="col-1">
			<a href="?logout">
			Chiqish
			</a>
		</div>

	</div>

<?php

$product_data = file_get_contents('database/product.txt');

$products = json_decode($product_data, true);

/*
$products = [
	'desktop_stand' => [
		'image' => "https://ae01.alicdn.com/kf/Sce7f5da211374d3fa40145f70e839116W.jpg_480x480.jpg",
		'title' => "Aluminum Desktop Stand",
		'opisanie' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam voluptatibus distinctio, ullam molestias maxime exercitationem alias natus temporibus provident eveniet sit quod velit cupiditate molestiae neque sed. Cumque, reprehenderit eius.",
		'price' => "4",
		'category' => "electronics"
		],
	'laptop_stand' => [
		'image' => "https://ae01.alicdn.com/kf/Hdc8b071de7c74b6a9d714c1b5216caffv.jpg_480x480.jpg",
		'title' => "Laptop Stand",
		'opisanie' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam voluptatibus distinctio, ullam molestias maxime exercitationem alias natus temporibus provident eveniet sit quod velit cupiditate molestiae neque sed. Cumque, reprehenderit eius.",
		'price' => "21"
		],
	'usb_hub' => [
		'image' => "https://ae01.alicdn.com/kf/S4709234fac3844408fd095eb31f7d913G.png_480x480.png",
		'title' => "USB hub 11 in 1",
		'opisanie' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam voluptatibus distinctio, ullam molestias maxime exercitationem alias natus temporibus provident eveniet sit quod velit cupiditate molestiae neque sed. Cumque, reprehenderit eius.",
		'price' => "35"
		],
	'mobile_stand' => [
		'image' => "https://ae01.alicdn.com/kf/S0d903e76e16c4eaa9e3fe0060305bd77k.jpg_480x480.jpg",
		'title' => "Mobile Stand",
		'opisanie' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam voluptatibus distinctio, ullam molestias maxime exercitationem alias natus temporibus provident eveniet sit quod velit cupiditate molestiae neque sed. Cumque, reprehenderit eius.",
		'price' => "3"
		]
];
*/

if (isset($_GET['search'])) {

	foreach ($products as $k=>$v) {

		if (strpos(' '.$v['title'], $_GET['search'])==true) {
			$products_temp[$k] = $v;
		}
	}

	$products = $products_temp;
	
}

?>