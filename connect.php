 <?php
  $user ="localhost";
  $name="root";
  $pass="";
  $dbname="pharmacy_man";
  
  $con= mysqli_connect($user,$name,$pass) or die("connection faild");
  
  mysqli_select_db($con,$dbname);
 
 ?>