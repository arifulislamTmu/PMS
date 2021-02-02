 <?php

include_once'database.php';
include_once'format.php';

?>
<?php
   class Product{
	   
	   private $db;
	   private $fm;
	   
	   public function __construct(){
		
		$this->db = new Database();
		$this->fm = new Format();
	}
	   
	  public function getFeaturedproduct($name){
		  
		   $query = "SELECT *
			FROM product
			INNER JOIN brand_table on product.brand_id=brand_table.brand_id
			INNER join generic_table ON product.generic_id = generic_table.generic_id
			INNER JOIN supplier_table ON product.supplier_id=supplier_table.supplier_id
            
            WHERE product_name LIKE '%$name%' ";
			
		    $result = $this->db->select($query);
		    return $result;
		   }
	  public function getTRUNCATE(){
		  
		   $query = "TRUNCATE`tbl_cart`; ";
		  $result = $this->db->selectt($query);
		  return $result;
	
		  
	  }
	  public function upadate($id,$quantity){
		  	$query = "UPDATE product SET product_id WHERE product_id='$id'";
			$updated_row = $this->db->update($query );
		  
	  }
	  
	  public function showProduct(){
		  
		   $query = "SELECT * FROM supplier_table";
		   $result = $this->db->select($query);
		    return $result;
	  }
	  public function showsingelpro( $supplier_name){
		  $select = "SELECT *
			FROM product
			INNER JOIN brand_table on product.brand_id=brand_table.brand_id
			INNER join generic_table ON product.generic_id = generic_table.generic_id
			INNER JOIN supplier_table ON product.supplier_id=supplier_table.supplier_id
            
            WHERE supplier_table.supplier_id='$supplier_name' ";
			
		    $result = $this->db->select($select);
		    return $result;
		  
	  }
	
	  
   }



?>