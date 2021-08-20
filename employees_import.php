<?php
include("Cls_login.php");
include("dbconnection.php");

?>



<?php
				$uploadedStatus = 0;

				if ( isset($_POST["submitbtn"]) ) {
					

						if (isset($_FILES["uploadfile"])) 
						{
							
							//if there was an error uploading the file

							if ($_FILES["uploadfile"]["error"] > 0)
							{
							echo "Return Code: " . $_FILES["uploadfile"]["error"] . "<br />";
							}
							else
							{
								$path="excel/temp/samples/";
								
								$filename=$path.round(microtime(true)).$_FILES["uploadfile"]["name"];
								
								/*
								if (file_exists($_FILES["uploadfile"]["name"])) 
								{
								unlink($_FILES["uploadfile"]["name"]);
								}
								*/
								//Delete($path);
								//mkdir($path);								
								move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $filename);

								$uploadedStatus = 1;
								
							echo "<div class='alert alert-success alert-dismissible' >";
							echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
							echo "<p >Staff Details  imported sucessfully</p>";
							echo "</div>";
							  global $con;	
							include("excel/PHPExcel_excel_to_mysql_demo.php");
                            
							}
						}
						else
						{
						echo "No file selected <br />";
						}

				}
					function Delete($path)
						{
								if (is_dir($path) === true)
								{
									$files = array_diff(scandir($path), array('.', '..'));

									foreach ($files as $file)
									{
										Delete(realpath($path) . '/' . $file);
									}
									

									return rmdir($path);
								}

								else if (is_file($path) === true)
								{
									return unlink($path);
								}
								

								return false;
						}


				

			?>
			
<html>
<head>
<script src="js/jquery.min.js"></script>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<style>

body {
  margin: auto;
  padding: 0;
  background-color: white;
  height: 100vh;
  max-width: 800px;

}
#login .container #login-row #login-column #login-box {
  margin-top: 120px;
  max-width: 900px;
  height: 320px;
  border: 1px solid #9C9C9C;
  background-color: #EAEAEA;
}
#login .container #login-row #login-column #login-box #login-form {
  padding: 20px;
}

</style>



<body>
<br/>


 <h1 align='center'>IMPORT EMPLOYEE DETAILS</h1>
    <div id="login">
       
        <div class="container center-block">
            <div id="login-row" class="row justify-content-center center-block align-items-center">
                <div id="login-column" class="col-md-12">
                    <div id="login-box" class="col-md-12">
					<br/>
<br/>
                         <form enctype="multipart/form-data" style="" action="" name='addForm' id='addForm' class="form-horizontal" role="form" method="post">
					<div class="form-group">
                        <label for="photo" class="col-sm-2 control-label col-xs-2 col-md-2">
                            Employee details &nbsp;<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Download the parent sample xls file first then see the format and make a copy of that file and add your data with exact format which is used in our xls file then upload the file."></i>
                        </label>
                        <div class="col-sm-3 col-xs-3 col-md-3">
                            <div class="btn btn-success form-control">
                                  <input id="uploadfile" type="file" required  name="uploadfile" accept="application/vnd.ms-excel,.csv,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />
                            </div>
                        </div>

                        <div class="col-md-1">
                            <input type="submit" class="btn btn-success" value="Import" id="submitbtn" name="submitbtn">
                        </div>

                        <div class="col-md-1">
                            <a class="btn btn-info" href="excel/PCsample.xlsx"><i class="fa fa-download"></i> Download Sample</a>
                        </div><br/><br/>
						<br/><br/>
						
						
						<br/><br/>
						<br/><br/>
						
						<a href='employees_view.php'>View Staff Details</a>
                    </div>
                </form>
				
                    </div>
                </div>
            </div>
        </div>
    </div>
	<br/><br/>
	 <div class="callout callout-danger">
                <p><b>Note:</b> </p>
				Supported Formats: Excel(<b>.xls,.xlsx</b>),CSV(<b>.csv</b>)<br/>
				<b>Instructions:</b> Download sample xls file first then see the format and make a copy of 
				that file and add your data with exact format which is used in our xls file then upload the file
              </div> 
  </div>
  	
  
  <script>
  
</script>
</body>
</html>