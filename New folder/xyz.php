<?php
require_once("header.php");
require_once("connect.php");
?>
<div class="newproduct">
 
<center>
 
  <table border="2"  >
    <h2 style="color:green; text-align:center;">Order_list</h2>
  <tr>
	   <th>S.L NO</th>
	   <th>Product Name</th>
	    <th>Brand Name</th>
	   <th>Price</th>
	 </tr>
  
  <?php 
	  if(isset($_REQUEST['submit'])){
		  
		  $ckh =$_REQUEST['ckh'];
		
		  $a = implode(",",$ckh);
		 
		  
		  $select = "SELECT *

			FROM product

			INNER JOIN brand_table on product.brand_id=brand_table.brand_id
			INNER join generic_table ON product.generic_id = generic_table.generic_id
			INNER JOIN supplier_table ON product.supplier_id=supplier_table.supplier_id
            
            WHERE product.product_id in ($a)";
			$run = mysqli_query($con,$select);
			 $sncount=1;
			while($rows = mysqli_fetch_array($run)){ ?>
			
			
			 <tr>
			 <td style="text-align:center;"><?php echo $sncount;$sncount++; ?></td>
			  <td style="text-align:center;"><?php  echo $rows ['product_name'] ;?></td>
			   <td style="text-align:center;"><?php  echo $rows ['brand_name'] ;?></td>
			  <td style="text-align:center;"><?php  echo $rows ['product_price'] ;?></td>
			 
			</tr>
			
			
		  
	<?php	
	  }
	
	  }
	?>


</table>

</center>
</div>
<?php
require_once("footer.php");


?>
