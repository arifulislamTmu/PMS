<?php
require_once("header.php");
require_once("connect.php");

?>
<div class="newproduct">
<center>
<table class="tablee" border="1">
    <tr>
		<th>S.L No</th>
		<th>Product Name</th>
		<th>Generic Name</th>
		<th>Product Price</th>
		<th>Quantity</th>
		<th>Supplier Name</th>
		<th>sale Qty</th>
		<th>Action</th>
   </tr>

 <form action="" method="POST">
       
	<h3>Product.Name:<input type="text" placeholder="search product" style="padding:8px; border-radius:8px; margin-bottom:15px;" name="searchterm">
	    <input type="submit" name="submitbtn" value="Search" style="border:2px solid#ddd;background:green;border-radius:8px;color:white;padding:10px;"></h3>
	
	</tr>
	
	</form>
 <?php
	   
	 if(isset($_REQUEST["searchterm"])){
      $SearchTarm	= $_REQUEST["searchterm"]; 
  
   $showdata="SELECt* FROM product 
        
		    INNER JOIN brand_table on product.brand_id=brand_table.brand_id
			INNER join generic_table ON product.generic_id = generic_table.generic_id
			INNER JOIN supplier_table ON product.supplier_id=supplier_table.supplier_id
   
                  WHERE product_name LIKE '%$SearchTarm%'";
   
   $rundata = mysqli_query($con, $showdata);
   if( $rundata==true){
	   $sncount=1;
	   while($mydata = mysqli_fetch_array($rundata)){ 
	   ?>
		   <tr>
			 <td style="text-align:center;"><?php echo $sncount;$sncount++; ?></td>
			 <td style="text-align:center;"><?php echo $mydata["product_name"]; ?></td>
			 <td style="text-align:center;"><?php echo $mydata["generic_name"]; ?></td>
			  <td style="text-align:center;"><?php echo $mydata["product_price"]; ?></td>
			  <td style="text-align:center;"><?php echo $mydata["product_qty"]; ?></td>
			 <td style="text-align:center;"><?php echo $mydata["supplier_name"]; ?></td>
			 <td style="text-align:center;"><input type="submit" name="sbtn" value="Add cart"></td>
			
			</tr>
		
<?php  } } ?>


	<?php  
	}
  
	?>

	</table>
</center> 
</div>
<?php
require_once("footer.php");

?>
