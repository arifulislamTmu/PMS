<?php include 'header.php';?>

<style>
  .button{
	  font-size:14px;
	  border-radius:8px;
	  color:white;
	  text-decoration:none;
	  background:#008000;
	  padding:10px;
  }

</style>
<div class="newproduct">
<center>
<table class="tablee" border="2">
  <form action="" method="post">
   <select name="supplier_name" style="width:200px; height:30px;margin:4px; font-size:15px;">
	   	<?php
		    
			
			
			$showpro = $pd->showProduct();
		  
		  
		    if($showpro){ ?>
				
				<option selected="selected" disabled="disabled" >--Select supplier --</option>
				<?php
				while($result =$showpro->fetch_assoc()){
			     ?>
				  
				
				 
			<option value="<?php echo $result['supplier_id'] ?>"><?php echo $result['supplier_name']?></option>

			<?php 
			}
			}
		 
		   ?>
	  </select></td>
	  
	  <input type="submit" name="subbtn" value="submit" style="border:2px solid#ddd;background:green;border-radius:8px;color:white;padding:10px;">
	  
	  </tr>
  </form>
     <tr>
	   <th>S.L NO</th>
	   <th>Product Name</th>
	    <th>Brand Name</th>
	   <th>Purchase Price</th>
	   <th>Sale Price</th>
	   <th>Quantity</th>
	   <th>Supplier Name</th>
	   <th>Action</th>
	 
	 </tr>
    <?php
	 if(isset($_POST['subbtn'])){
		 
		 $supplier_name = $_POST['supplier_name'];
		 
		 $swohproduct = $pd->showsingelpro( $supplier_name);
		 
			if($swohproduct){
		 $sncount=1;
			while($result =$swohproduct->fetch_assoc()){ ?>
				
			 <tr>
			 <td style="text-align:center;"><?php echo $sncount;$sncount++; ?></td>
			 <td style="text-align:center;"><?php  echo $result ['product_name'] ;?></td>
			 <td style="text-align:center;"><?php  echo $result ['brand_name'] ;?></td>
			  <td style="text-align:center;"><?php echo $result['purses_price'];?></td>
			  <td style="text-align:center;"><?php  echo $result ['product_price'] ;?></td>
			  <td style="text-align:center;"><?php  echo $result ['product_qty'] ;?></td>
			  <td style="text-align:center;"><?php  echo $result ['supplier_name'] ;?></td>
			  <td style="text-align:center;"><button class="button"><a class="button" href="allsignelproup.php?proid=<?php  echo $result ['product_id'] ;?>">Insert product</a></button></td>
			
			</tr>
		
			<?php	
			}
			}	 
	 }
	
	?>
	
	
  
  </form>


</table>
</center>
</div>

<?php
require_once("footer.php");


?>
