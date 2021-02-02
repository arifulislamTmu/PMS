 
<?php

require_once("header.php");
require_once("connect.php");


?>
<div class="newproduct">
<center>
<table class="tablee" border="1">

   <tr>
      <th>Product Name</th>
      <th>Product Brand</th>
      <th>Generic Name </th>
      <th>Supplier Name </th>
      <th>Price </th>
      <th>Total Quantity </th>
      <th>Total Price </th>
   </tr>
   
   <?php
   
    
   
      $sql = "
	  SELECT *

			FROM product

			INNER JOIN brand_table on product.brand_id=brand_table.brand_id
			INNER join generic_table ON product.generic_id = generic_table.generic_id
			INNER JOIN supplier_table ON product.supplier_id=supplier_table.supplier_id  ";
                      
					  $run = mysqli_query($con, $sql);
                         $sum = 0;
                         $qty = 0;
                         while( $rows = mysqli_fetch_array($run)){  ?>
						 
						      <tr>
								 <td style="text-align:center;"><?php echo $rows['product_name'];?></td>
								 <td style="text-align:center;"><?php echo $rows['brand_name'];?></td>
								 <td style="text-align:center;"><?php echo $rows['generic_name'];?></td>
								 <td style="text-align:center;"><?php echo $rows['supplier_name'];?></td>
								 <td style="text-align:center;"><?php echo $rows['product_price'];?></td>
								 <td style="text-align:center;"><?php echo $rows['product_qty'];?></td>
							  <td style="text-align:center;"><?php 
					           $total = $rows['product_price'] * $rows['product_qty'];
					           echo $total; 
					?></td>
					</tr>
					<?php
				  
				  $sum = $sum +$total;
				
				?>
			<?php
               }   
            ?>
   
   <tr>
   <td></td><td></td><td></td><td></td><td></td><td><span style="font-size:18px;color:red;">Total :<td style="text-align:center;" ><?php echo "<span style='color:red;font-size:18px;'>$sum</span>" ?> </td></span></td>
   </tr>
</table>
</center>
</div>
<?php
require_once("footer.php");


?>
