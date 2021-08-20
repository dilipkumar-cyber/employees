<?php
function ExportExcel($table)
	{  

	global $con,$path;
		$filename = $path.strtotime("now").'.csv';
		$sql = mysqli_query($con,"SELECT Sid,ProductsCategoryName,Description,Recorddate FROM $table  ") or die(mysqli_error());
		$num_rows = mysqli_num_rows($sql);
		if($num_rows >= 1)
		{
			$row = mysqli_fetch_assoc($sql);
			$fp = fopen($filename, "w");
			$seperator = "";
			$comma = "";

			foreach ($row as $name => $value)
				{
					$seperator .= $comma . '' .str_replace('', '""', $name);
					$comma = ",";
				}

			$seperator .= "\n";
			fputs($fp, $seperator);
	
			mysqli_data_seek($sql, 0);
			while($row = mysqli_fetch_assoc($sql))
				{
					$seperator = "";
					$comma = "";

					foreach ($row as $name => $value) 
						{
							$seperator .= $comma . '' .str_replace('', '""', $value);
							$comma = ",";
						}

					$seperator .= "\n";
					fputs($fp, $seperator);
				}
	
			fclose($fp);
		
				
				echo "<div class='alert alert-success alert-dismissible' >";
			    echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>";
                echo "<p><a href='$filename'> <i class='icon fa fa-check'></i>Your file is ready. You can download it from&nbsp;here!</a></p>";
				echo "</div>";
               
				
			
		}
		else
		{
			echo "There is no record in your Database";
		}


	}
?>