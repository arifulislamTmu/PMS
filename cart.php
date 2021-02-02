<?php include 'header.php';?>

<div class="newproduct">
<?php
  if(isset($_GET['delpro'])){
	  $delid = $_GET['delpro'];
	  $delproduct = $ct->deleteCartproduct($delid);
  }
?>

<?php
 if($_SERVER['REQUEST_METHOD']=='POST'){
  	$cartId = $_POST['product_id'];
  	$quantity = $_POST['quantity'];
  	$updateCart =  $ct->updateCartQuantity($cartId,$quantity);
	if($quantity <=0){
		 $delproduct = $ct->deleteCartproduct($cartId);
	}
	
  } 
?>
 <!DOCTYPE HTML>
 <html lang="en-US">
 <head>
 	<meta charset="UTF-8">
 	<title></title>
	<link href="w3.css" rel="stylesheet"/>
 </head>
 <body>
 	<div class="container">



<?php
if(!isset($_GET['product'])){
	echo "<meta http-equiv='refresh' content='0;url=?product=arif'/>";
	
}
?>
	<table  border='2'>
				<tr>
					<th width="5%">S.L</th>
					<th width="18%">Product Name</th>
					<th width="15%">Price</th>
					<th width="2%">Quantity</th>
					<th width="10%">Action</th>
					<th width="10%">Total Price</th>
				</tr>
				<?php
				  $getpro = $ct->getCartProduct();
				  if($getpro){
					  $i=0;
					  $sum=0;
					  $qty=0;
					  while($result =$getpro->fetch_assoc()){
						  $i++;
			       	?>
				<form action="" method="post">
				<tr>
					<td style="text-align:center;"><?php echo $i; ?></td>
					<td style="text-align:center;"><?php echo $result['product_name']; ?></td>
					<td style="text-align:center;"><?php echo $result['product_price']; ?></td>
					<input type="hidden" name="product_id" value="<?php echo $result['product_id']; ?>"/>
							<td style="text-align:center;"><input type="number" name="quantity" value="<?php echo $result['quantity']; ?>"/></td>
							<td style="text-align:center;"><input type="submit" class ="button" name="submit" value="Update"/> |
							<a onclick="return confirm('Are you sure!!')" href="?delpro=<?php echo $result['product_id'];?>">X</a></td>
						</form>
						<td style="text-align:center;"><?php 
					  $total = $result['product_price'] * $result['quantity'];
					    echo $total; 
					?></td>
					
				</tr>
				
				<?php
				  $qty = $qty + $result['quantity'];
				  $sum = $sum +$total;
				
				?>
				  <?php } }?>
			</table>
				 	
			<table style="float:right;text-align:left;" width="25%">
				<tr>
					<th>Sub Total : </th>
					<td><?php echo @$sum?></td>
				</tr>
				<tr>
					<th>Discount: </th>
					<td>5%</td>
				</tr>
				<tr>
					<th>Grand Total :</th>
					<td><?php 
					 @$vat = $sum*0.05;
					 @$grandTotal = $sum - $vat;
					 echo @$grandTotal;
					?> </td>
				</tr>
		   </table>
			</div>
		<button id="print" class="botoon">Print Invoice</button>

	<script src="jquery.min.js"></script>
	<script src="printThis.js"></script>
	<script>
	$('#print').click(function(){
	  $('.container').printThis();
	})
	</script>
 </body>
 </html>
 </div>
	<?php include 'footer.php';?>