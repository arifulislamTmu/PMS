 <?php

include_once'database.php';
include_once'format.php';

?>
<?php
class Cart{

	private $db;
	private $fm;
	public function __construct(){
		
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function addToCart($id,$quantity){
		
		$squery = "SELECT * FROM product WHERE product_id='$id'";
		  $select = $this->db->select($squery );
	       if($select){
			while($result = $select->fetch_assoc()){
				
			$productName = $result['product_name'];
			$price = $result['product_price'];
			
		   $chkquery = "SELECT * FROM product WHERE product_qty <'$quantity' AND product_id='$id' ";
			  $chakpro =$this->db->select($chkquery);
			    if($chakpro){
				echo "<span style='color:red; font-size:20px;text-align:center;'>&nbsp &nbsp Not Available Quantity !!!<br></span>";
			  }else{
	
		  $query= "INSERT INTO tbl_cart(product_id,product_name,product_price,quantity) 
		  VALUES('$id ','$productName ','$price ','$quantity ')";
		  $insert_row = $this->db->insert($query );
		if($insert_row){
			 
		$query= "INSERT INTO tbl_cart2(product_id,product_name,product_price,quantity) 
		     VALUES('$id ','$productName ','$price ','$quantity ')";
		      $insert_row = $this->db->insert($query );
			  
			
			if($insert_row)
			       {
				  $query = "UPDATE product SET product_qty = product_qty-'$quantity' WHERE product_id='$id'";
			$updated_row = $this->db->update($query );
			header('location:search.php');
	}else{
		echo"datainsert not22222";
	}
	
		}
			}
	}
		   }
}	
  public function getCartProduct(){
		$query = "SELECT * FROM tbl_cart";
		$result =$this->db->select($query);
		return $result;
		
	}	
	
	
	public function deleteCartproduct($delid){
		
		$delquery = "DELETE FROM tbl_cart WHERE product_id='$delid'";
		$deleted_row = $this->db->delete($delquery );
		if($deleted_row ){
				$msg  = "<span class='error'style='font-size:18px;color:red;'> Quantity   Deleted.</span>";
			    return $msg;
			   }else{
				$msg  = "<span class='error'style='font-size:18px;color:red;'> Quantity  not Delete.</span>";
			    return $msg;
			}
	}
	public function updateCartQuantity($cartId,$quantity){
		$cartId = mysqli_real_escape_string($this->db->link,$cartId);
		$quantity = mysqli_real_escape_string($this->db->link,$quantity);
		
		$query = "UPDATE tbl_cart SET quantity='$quantity' WHERE product_id='$cartId'";
			
			$updated_row = $this->db->update($query );
			
			if($updated_row ){
				$query = "UPDATE tbl_cart2 SET quantity='$quantity' WHERE product_id='$cartId'";
			
			$updated_row = $this->db->update($query );
			
				
				header("location:cart.php");
			   }else{
				$msg  = "<span class='error'style='font-size:18px;color:red;'> Quantity  not Updated.</span>";
			    return $msg;
		
			
			}	
	}
	
	public function  addToCartt($id,$quantity,$product_price,$perche_price){
		 $query = "UPDATE product SET product_qty =product_qty+'$quantity',product_price='$product_price',purses_price='$perche_price' WHERE product_id='$id'";
			$updated_row = $this->db->update($query );
		header('location:allsignel.php');
		
	}
	public function quantityshow($id){
			$squery = "SELECT * FROM product WHERE product_id='$id'";
		  $result = $this->db->select($squery)->fetch_assoc();
	      return $result;
	  }
	 
}

?>