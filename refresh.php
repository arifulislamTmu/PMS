

<table>
    <form action="" method="POST">
<input type="submit" name="submit1" value="Refresh">
<button><a href="cart.php">Sale Product</a></button>

</form>

<?php

if(isset(empty('submit1')){
	
	echo "";
}else{
	$getFpd = $pd->getTRUNCATE();
	
	if($getFpd){
		
		echo"Refresh succesfully";
	}
}

?>