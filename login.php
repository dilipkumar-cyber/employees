<?php
include("Cls_login.php");
include("dbconnection.php");
if (isset($_POST["submit"])) {
	$obj=new Login();
	$res=$obj->loginCheck($_POST["username"], $_POST["password"]);
      
  if ($res) {
    	$_SESSION["username"] = $_POST["username"];
	$_SESSION["loginstatus"] =true;	
	$url="home.php";
	header("Location: ".$url);
	/*
	$url="user_pages/Dashboard/user_dashboard.php";
	header("Location: ".$url);
	echo $url;
	*/
  }
  /*
  else if($_POST["username"] == "admin" && $_POST["password"] == "123"){
	 $_SESSION["username"] = "admin";
	 $_SESSION["loginstatus"] =true;
	 $url="admin_pages/admin_dashboard.php";
	 header("Location:".$url);  
	 
  }*/
}
?>
<html>
<head>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="jquery/jquery.min.js"></script>
</head>
<style>

body {
  margin: auto;
  padding: 0;
  background-color: #555555;
  height: 100vh;
  max-width: 500px;

}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 600px;
  height: 320px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}

</style>



<body>
    <div id="login">
        
        <div class="container center-block">
            <div id="login-row" class="row justify-content-center center-block align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center ">Login</h3>
                            <div class="form-group">
                                <label for="username" >Username:</label><br>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" >Password:</label><br>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                               
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>