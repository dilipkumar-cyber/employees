<?php
session_start();
  /* Login  Class */
  class Login 
  {
	 
	  function __construct() 
  
		  {
  
			
  
		  }
  
	  /*Login   functions start */  
			 function loginCheck($username,$password)  
			 {
				global $con;
			  	$sql = "SELECT * FROM users WHERE username ='".$username."' AND password='".$password."' LIMIT 1";		
		 	     $res = mysqli_query($con,$sql);
				$userrecord=mysqli_fetch_array($res);
				 if(mysqli_num_rows($res) == 1 )
				 {
					
					$userid=$userrecord['userid'];
					global $con;						
					$r=mysqli_query($con,"update users set LastLogin=now() where userid={$userid}");				 
					if(!($r))
					 {	
					 dir('error'.mysqli_error());										 
					 }					 
		            return $userrecord['userid'];
				}
				 else 
				 {
					echo "<script>
							alert('Invalid username or password');	
		
						</script>";	 
				 return false;
				 }
			
					
	  		     mysqli_close($con);        
  
			 }
			 
			
       
	  
  
	  
  
	  
  }
  
 ?>