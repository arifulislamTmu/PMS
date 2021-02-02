
<?php
if(isset($_COOKIE['current_user'])){
	
	header("location:index.php");
}

?>
 <?php

require_once("connect.php");


?>
 
 <!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Pharmacy management system</title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>
	<div class="main_contant">
	   <div class="header">
	      <p>Pharmacy Managment System</p>
	   </div>
	   <div class="newproducts">
	    <center>
		<div class="log_box">
		<table>
		
		<form action="" method="POST">
	    
		   <tr>
		      <img src="images/home/user.png" style="width:40px; height:50px;margin-bottom:-15px; margin-top:60px;"><input type="text" name="name" id="email"  placeholder="User Name"/></img><br>
		  </tr>
		   
		  <tr>
	        <img src="images/home/pass.png" style="width:40px; height:50px;margin-bottom:-15px;"><input type="password" name="pass" id="pass"  placeholder="User password"/><br>
		  </tr>
		<tr>
		 <tr>
			<td></td><td></td><td colspan="5"><input type="submit" name="subbtn" id="log-btn"value="Login" /><td>
		</tr>
		
	     </form>
		
		
		  </div>
		
		   </table>
		     <br>
		  <?php
		    if(isset($_POST['subbtn'])){
				
				$name =$_POST['name'];
				$pass = $_POST['pass'];
				
				$slect ="select *  from user_table where name='$name' AND pass='$pass'";
				
				$run = mysqli_query($con,$slect);
					
					$chakq = mysqli_num_rows($run);
					
					if($chakq){
						setcookie("current_user", $name ,time()+(86400*7));
						
					 header("location:index.php");
						 
					}else{
						
						echo '<b style="color:red;"><h3>User name or password Incorect</h3></b>';
					}
					
				}
			
		  
		  ?>
		  
		  </center>
	</div>
	 <div class="footer">
    <p>copyright@2019</p>
	  <span>ariful0027@gmail.com</span>
 
 
 </div>
 
 </div>
	
</body>
</html>