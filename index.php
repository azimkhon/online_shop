<?php 


error_reporting(0);

session_start();

if ($_SESSION['login']==0) {

	if (isset($_GET['page'])) {
		require 'pages/reg.php';
	} else {
		require 'pages/login.php';
	}
	
}

//print_r($_SESSION);

if ($_SESSION['login']==1) {

require 'core/header.php';

if (isset($_GET['page'])) {
	require 'pages/'.$_GET['page'].'.php';
} else {
	require 'pages/main.php';
}
require 'core/footer.php';

}

?>
