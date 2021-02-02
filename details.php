<?php include 'header.php';?>
<center>
<div class="newproduct">

<?php

if(isset($_POST['submit1'])){
	$getFpd = $pd->getTRUNCATE();
	
	if($getFpd){
		
		echo"Refresh succesfully";
	}
}

?>

<?php

		 if(isset($_GET['proid'])){
			 
			   $id = $_GET['proid'];
			  
		   }
		 
		  if($_SERVER['REQUEST_METHOD']=='POST'){

			$quantity = $_POST['quantity'];
			
			$addCart =  $ct->addToCart($id,$quantity);

		  }
 ?>
 
			<?php
              if(isset($addCart)){
				 echo $addCart; 
			  }
			?> 
			<div class="add-cart">
				<form action="" method="post">
					<h3>Select Qty: <td></td><input type="text" class="buyfield" name="quantity" value="1" style="padding:8px; border-radius:8px; margin-bottom:15px;"/>
					<input type="submit" class="buysubmit" name="submit" value="Sale Now"style="border:2px solid#ddd;background:green;border-radius:8px;color:white;padding:10px;"/></h3>
				</form>				
				</div>
	

<table border="1">
  <tr>
    <th>S.L</th>
    <th>Product Name</th>
    <th>Product Price</th>
    <th>Product Qty</th>
    <th>Action</th>
  </tr>
	 <?php
	 
	 if(isset($_POST['subbnt'])){
		 $name =$_POST['proname'];
		
		 $getFpd = $pd->getFeaturedproduct($name);
	 if($getFpd){
		 $i=0;
		while($result = $getFpd->fetch_assoc()){
			$i++;
		 ?>
		 <tr>
		 <td style="text-align:center;"><?php echo $i;?>
		 <td style="text-align:center;"><?php echo $result['product_name'];?>
		 <td style="text-align:center;"><?php echo $result['product_price'];?></td>
		 <td style="text-align:center;"><?php echo $result['product_qty'];?></td>
		 <td style="text-align:center; "><button><a style="text-decoration:none; color:black;" href="details.php?proid=<?php echo $result['product_id'];?>">Sale Product</a></button></td>
	 </tr>
	 <?php } } } ?>

</table>

</div>
</center>
<?php
require_once("footer.php");
?>