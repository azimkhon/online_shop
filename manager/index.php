<?php 


error_reporting(1);
ob_start();
session_start();

if (isset($_GET['logout_admin'])) {
	session_destroy();
	header("Location: ../index.php");
}

if ($_SESSION['login_admin']==0) {
	require 'login.php';
}

//print_r($_SESSION);

if ($_SESSION['login_admin']==1) {

if (isset($_GET['page'])) {
	require $_GET['page'].'.php';
} else {
	require 'users.php';
}

}

?>
