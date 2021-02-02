 <?php include 'header.php';?>
<center>
<div class="newproduct">



<?php

		 if(isset($_GET['proid'])){
			 
			   $id = $_GET['proid'];
			  
		   }
		 
		  if($_SERVER['REQUEST_METHOD']=='POST'){

			$quantity = $_POST['quantity'];
			$product_price = $_POST['product_price'];
			$perche_price = $_POST['purses_price'];
			
			$addCart =  $ct->addToCartt($id,$quantity,$product_price,$perche_price);
			
			}
			$showcart =$ct->quantityshow($id);
			
		?>
		
		
			<table>
			
				<form action="" method="post">
			    
			  <tr>
					<td><h3> New Price:</h3></td><td><input type="text" class="buyfield" value=<?php echo $showcart['purses_price'];?> name="purses_price"
					 style="padding:8px; border-radius:8px; margin-bottom:15px;"/></td>
					</tr>
			
				<tr>
					<td><h3> Sale Price:</h3></td><td><input type="text" class="buyfield" name="product_price"
					value=<?php echo $showcart['product_price'];?>  style="padding:8px; border-radius:8px; margin-bottom:15px;"/></td>
					</tr>
					
					<td><h3>New Quantity:</h3></td><td><input type="number" class="buyfield" name="quantity" value=<?php echo $showcart['product_qty'];?> style="padding:8px; border-radius:8px; margin-bottom:15px;"/></td>
					</tr>
					
					<tr>
					<td></td><td><input type="submit" class="buysubmit" name="submit" value="INSERT"style="border:2px solid#ddd;background:green;border-radius:8px;color:white;padding:10px;"/></h3></td>
				</tr>
				</form>				
				</div>
				</tr>
			</table>
				 
				  	
</div>
</center>
<?php
require_once("footer.php");
?>