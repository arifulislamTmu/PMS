<?php
include'session.php';
session_start();
Session::init();
include'database.php';
include'format.php';
include'Product.php';
include'Cartclass.php';
$db 	= new Database();
$fm 	= new Format();
$pd	   = new Product();
$ct   = new Cart();
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
 
?>


<?php
if(!isset($_COOKIE['current_user'])){
	
	header("location:login.php");
}
?>

 <!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Pharmacy management system</title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	<div class="main_contant">
	   <div class="header">
	      <p>Pharmacy Management System</p>
	   </div>
	   
	 <div class="nav">
	    <ul>
		   <li><a href="index.php">Home</a></li>
		   <li><a href="">Insert Product</a>
		     <ul>
		     <li><a href="addcat.php">Insert Brand</a></li>
		      <li><a href="newproduct.php">Insert New Product</a></li>
			  </ul>
		    </li>
		   <li><a href="allproduct.php">All Products</a></li>
		   <li><a href="allsignel.php">All supplier </a></li>
		   <li><a href="search.php">Search Products</a></li>
		   <li><a href="cart.php">Sale product</a></li>
		   <?php
		     if(!isset($_COOKIE['current_user'])){
				 
				 echo'<li><a href="login.php">Admin Login</a></li>';
			 }else{
				 
				 echo'<li><a href="logout.php">Logout</a></li>';
			 }
		   
		   
		   ?>
		</ul>
		
	 </div>
	