 <?php
require_once("header.php");
require_once("connect.php");

?>
<div class="newproduct">
<center>
<table>
<form action="" method="POST">
   <tr>
      <td><h3>Brand Name:</td><td><input type="text" name="brand_name" required="" style="width:200px; height:30px;margin:4px; font-size:15px;"></td></h3>
   </tr>
    <tr>
        <td><h3></td><td><input type="submit" name="subbtn1" value="Add Brand" ></td></h3>
   </tr>
   <?php
      if(isset($_POST['subbtn1'])){
		  
		  $brand_name =$_POST['brand_name'];
		  
		  $insert ="insert into brand_table(brand_name) values('$brand_name') ";
		 
		  
		  $run = mysqli_query($con,$insert);
		  
		  if($run){
			  
			 
			  
		  }else{
			  
			  echo"not inserted";
			  
		  }  
	  }
   ?>
   </form>
   <form action="" method="POST">
     <tr>
       <td><h3>Generic Name:</td><td><input type="text" name="generic_name" required="" style="width:200px; height:30px;margin:4px; font-size:15px;" ></td></h3>
   </tr>
    <tr>
     <td><h3></td><td><input type="submit" name="subbtn2" value="Add Generic" ></td></h3>
   </tr>
   
    <?php
      if(isset($_POST['subbtn2'])){
		  
		  $generic_name =$_POST['generic_name'];
		  
		  $insert ="insert into generic_table(generic_name) values('$generic_name') ";
		 
		  
		  $run = mysqli_query($con,$insert);
		  
		  if($run){
			  
			 
			  
		  }else{
			  
			  echo"not inserted";
			  
		  } 
	  }
   ?>
   
   
   </form>
   <form action="" method="POST">
     <tr>
       <td><h3>Supplier Name:</td><td ><input type="text" name="supplier_name" required="" style="width:200px; height:30px;margin:4px; font-size:15px;"></td></h3>
   </tr>
    <tr>
        <<td><h3></td><td><input type="submit" name="subbtn3" value="Add Supplier" ></td></h3>
   </tr>
   
    <?php
      if(isset($_POST['subbtn3'])){
		  
		  $supplier_name =$_POST['supplier_name'];
		  
		  $insert ="insert into supplier_table(supplier_name) values('$supplier_name') ";
		 
		  
		  $run = mysqli_query($con,$insert);
		  
		  if($run){
			
			  
		  }else{
			  
			  echo"not inserted";
			  
		  } 
	  }
   ?>
   
   </form>
   

<?php


?>


</table>
</center>
</div>

<?php
require_once("footer.php");

?>