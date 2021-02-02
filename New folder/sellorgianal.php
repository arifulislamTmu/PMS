<?php   
 
require_once("header.php");

require_once("connect.php");
?>
<div class="newproduct">
<?php
if(isset($_POST["add_to_cart"]))  
{  
if(isset($_SESSION["shopping_cart"]))  
{  
$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
if(!in_array($_GET["product_id"], $item_array_id))  
	{  
	$count = count($_SESSION["shopping_cart"]);  
		$item_array = array(  
		'item_id'   =>    $_GET["product_id"],  
		'item_name'   =>    $_POST["hidden_name"],  
		'item_price'   =>    $_POST["hidden_price"],  
		'item_quantity'  =>    $_POST["quantity"]  
		);  
	$_SESSION["shopping_cart"][$count] = $item_array;  
	}  
	else  
	{  
echo '<script>alert("Item Already Added")</script>';  
echo '<script>window.location="search.php"</script>';  
}  
}  
else  
	{  
	$item_array = array(  
	'item_id'               =>     $_GET["product_id"],  
	'item_name'               =>     $_POST["hidden_name"],  
	'item_price'          =>     $_POST["hidden_price"],  
	'item_quantity'          =>     $_POST["quantity"]  
	);  
$_SESSION["shopping_cart"][0] = $item_array;  
}  
}  
	if(isset($_GET["action"]))  
	{  
		if($_GET["action"] == "delete")  
		{  
		foreach($_SESSION["shopping_cart"] as $keys => $values)  
		{  
		if($values["item_id"] == $_GET["product_id"])  
	{  
			unset($_SESSION["shopping_cart"][$keys]);  
		echo '<script>alert("Item Removed")</script>';  
		echo '<script>window.location="search.php"</script>';  
	}  	
	}  
	}  
	}  
?> 

<center>
<table border="2">
<tr>
  <th>Product Name</th>
  <th>Product Price</th>
  <th>Total Qty</th>
  <th>Supplier Name</th>
  <th> Sale Qty</th>
  <th> Action</th>
  
 
</tr>

 <form action="" method="POST">
       
	<h3>Product Name:<input type="text" placeholder="search product" style="padding:8px; border-radius:8px; margin-bottom:15px;" name="searchterm">
	    <input type="submit" name="submitbtn" value="Search" style="border:2px solid#ddd;background:green;border-radius:8px;color:white;padding:10px;"></h3>
	
	</tr>
	
	</form>
 <?php
	   
	 if(isset($_REQUEST["searchterm"])){
      $SearchTarm	= $_REQUEST["searchterm"]; 

		$query = "SELECT * FROM product
            	INNER JOIN supplier_table ON product.supplier_id=supplier_table.supplier_id
	          	WHERE product_name LIKE '%$SearchTarm%'";  
		$result = mysqli_query($con, $query); 
		
		 if(mysqli_num_rows($result) > 0)  
	    {  
	   while($row = mysqli_fetch_array($result))  
	  {  
   ?>  

    <form align="center" method="post" action="search.php?action=add&product_id=<?php echo $row["product_id"]; ?>">  
          <tr>
		     <td style="text-align:center;"><?php echo $row["product_name"]; ?></td>
		  
		     <td style="text-align:center;"><?php echo $row["product_price"]; ?></td>
		     <td style="text-align:center;"><?php echo $row["product_qty"]; ?></td>
		     <td style="text-align:center;"><?php echo $row["supplier_name"]; ?></td>
			 
		   <td><input style="text-align:center;" type="text" name="quantity" value="0" /></td>
		   <input type="hidden" name="hidden_name" value="<?php echo $row["product_name"]; ?>" />
		   <input type="hidden" name="hidden_price" value="<?php echo $row["product_price"]; ?>" />
			
			
 <td><input type="submit" name="add_to_cart" value="Add to Cart" /> </td>

</tr>
</form>   

	   
   
<?php  
}  
}  
	 }
?> 
</center>
</div> 
</table>

 <div class="sales">
<h3>Sale product list:</h3>  

<table border="1">  
  <tr>  
	   <th >Product Name</th>  
	   <th>Quantity</th>  
	   <th>Price</th>  
	   <th>Total</th>  
	   <th>Action</th>  
  </tr>  
  <?php   
  if(!empty($_SESSION["shopping_cart"]))  
  {  
	   $total = 0;  
	   foreach($_SESSION["shopping_cart"] as $keys => $values)  
	   { 

			 
  ?>  
  <tr>  
	   <td><?php echo $values["item_name"]; ?></td>  
	   <td><?php echo $values["item_quantity"]; ?></td>  
	   <td><?php echo $values["item_price"]; ?></td>  
	   <td><?php echo number_format($values["item_quantity"] * $values["item_price"],); ?></td>  
	   <td><a href="search.php?action=delete&product_id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
  </tr>  
  <?php  
			$total = $total + ($values["item_quantity"] * $values["item_price"]);  
	   }  
  ?>  
  <tr>  
	   <td colspan="3" align="right">Total</td>  
	   <td align="right"><?php echo number_format($total,); ?></td>  
	   <td></td>  
  </tr>  
  <?php  
  }  
  ?>  
</table>  
</div>
</div>
<?php
require_once("footer.php");


?>