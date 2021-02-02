
<?php
require_once("header.php");
require_once("connect.php");


?>
<div class="newproduct">
<center>
<table >
 
  <form action="" method="post">
    <tr>
	  <td style="font-size:20px;">Product Name:</td><td><input style="width:200px; height:30px;margin:4px;" type="text" name="product_name" required ></td>
	  <tr>
	  <td style="font-size:20px;">Category Type:</td><td>
	  <select name="brand_name" style="width:200px; height:30px;margin:4px; font-size:15px;">
	          
		<?php
		     $sqli= "SELECT * FROM brand_table";
			 
			 $run = mysqli_query($con,$sqli);
			     ?>
				  <option selected="selected" disabled="disabled" >--Select Category--</option>
				<?php
			 while($pro = mysqli_fetch_array($run)){ 

			 ?>
				 
			<option value="<?php echo $pro['brand_id'] ?>"><?php echo $pro['brand_name']?></option>

			<?php 
			 }
		   
		   ?>
	  </select></td>
	  </tr>
	  <tr>
	  <td style="font-size:20px;">Generic Name:</td><td>
	  <select name="generic_name" style="width:200px; height:30px;margin:4px; font-size:15px;">
	    	
			<?php
		     $sqli= "SELECT * FROM generic_table";
			 
			 $run = mysqli_query($con,$sqli);
			     ?>
				  <option selected="selected" disabled="disabled" >--Select generic --</option>
				<?php
			 while($pro = mysqli_fetch_array($run)){ 

			 ?>
				 
			<option value="<?php echo $pro['generic_id'] ?>"><?php echo $pro['generic_name']?></option>

			<?php 
			 }
		   
		   ?>
	  </select></td>
	  </tr>
	  <tr>
	 <td style="font-size:20px;">Supplier Name:</td><td>
	 <select name="supplier_name" style="width:200px; height:30px;margin:4px; font-size:15px;">
	   	<?php
		     $sqli= "SELECT * FROM supplier_table";
			 
			 $run = mysqli_query($con,$sqli);
			     ?>
				  <option selected="selected" disabled="disabled" >--Select supplier --</option>
				<?php
			 while($pro = mysqli_fetch_array($run)){ 

			 ?>
				 
			<option value="<?php echo $pro['supplier_id'] ?>"><?php echo $pro['supplier_name']?></option>

			<?php 
			 }
		   
		   ?>
	  </select></td>
	  </tr>
	  
	   <tr>
		 <td style="font-size:20px;">Purchase price:</td><td>
		 <input style="width:200px; height:30px; margin:4px;" type="text" name="purses_price"></td>
	  </tr>
	  
	  <tr>
		 <td style="font-size:20px;">Sale Price:</td><td>
		 <input style="width:200px; height:30px; margin:4px;" type="text" name="product_price"></td>
	  </tr>
	    <tr>
		 <td style="font-size:20px;">Product Quantity:</td><td>
		 <input style="width:200px; height:30px; margin:4px;" type="number" name="product_qty"></td>
	  </tr>
	  <tr>
	 <td></td><td style="font-size:20px;"><input type="submit" name="subbtn" value="submit" style="border:2px solid#ddd;background:green;border-radius:8px;color:white;padding:10px;"></td>
	
	</tr>
  
  </form>
		<?php
           if(isset($_POST['subbtn'])){
			   
			   
			   
		$insert="  INSERT product SET
					`product_name`='$_POST[product_name]',
					`brand_id`='$_POST[brand_name]',
					`generic_id`='$_POST[generic_name]',
					`supplier_id`='$_POST[supplier_name]',
					`purses_price`='$_POST[purses_price]',
					`product_price`='$_POST[product_price]',
					`product_qty`='$_POST[product_qty]'
					
					";
								   
			   $run= mysqli_query($con, $insert);
			   
			   if($run){
				   
				   echo "data inserted";
			   }else{
				   
				    echo "data not inserted";
			   }
			   
			   
			   
		   }
		   
		?>

  
</table>
</center>
</div>

<?php
require_once("footer.php");


?>