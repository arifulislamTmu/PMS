
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

<form action="" method="POST">
    	<h3>Product Name:<input type="text" name="proname" placeholder="search product" required="" style="padding:8px; border-radius:8px; margin-bottom:15px;">
	<input type="submit" name="subbnt" value="Search" style="border:2px solid#ddd;background:green;border-radius:8px;color:white;padding:10px;">
	<input type="submit" name="submit1" value="Refresh"style="border:2px solid#ddd;background:red;border-radius:8px;color:white;padding:10px;"></h3>
	
</form>

<table class="tablee" border="1">
  <tr>
    <th>S.L</th>
    <th>Product Name</th>
	<th>Category Name</th>
	 <th>Purchase price</th>
	 <th>Sale Price</th>
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
		 <td style="text-align:center;"><?php  echo $result ['brand_name'] ;?></td>
		 <td style="text-align:center;"><?php echo $result['purses_price'];?></td>
		 <td style="text-align:center;"><?php echo $result['product_price'];?></td>
		 <td style="text-align:center;"><?php echo $result['product_qty'];?></td>
		 <td style="text-align:center; "><button class="button"><a  class="button" href="details.php?proid=<?php echo $result['product_id'];?>">Sale Product</a></button></td>
	 </tr>
	 <?php } } } ?>

</table>

</div>
</center>
<?php
require_once("footer.php");
?>