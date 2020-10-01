<?php 

ob_start();
session_start();

if (isset($_SESSION['kullanici_ad'])) {
	
	header('location:production');
} else {
	header('location:production/login.php');
}










 ?>