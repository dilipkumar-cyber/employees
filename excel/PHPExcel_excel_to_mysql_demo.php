<?php
/**
 * PHPExcel - Excel data import to MySQL database script example
 * ==============================================================================
 * 
 * @version v1.0: PHPExcel_excel_to_mysql_demo.php 2016/03/03
 * @copyright Copyright (c) 2016, http://www.ilovephp.net
 * @author Sagar Deshmukh <sagarsdeshmukh91@gmail.com>
 * @SourceOfPHPExcel https://github.com/PHPOffice/PHPExcel, https://sourceforge.net/projects/phpexcelreader/
 * ==============================================================================
 *
 */
 
require 'Classes/PHPExcel/IOFactory.php';

// Mysql database
	
	global $path,$username,$password;	
	$servername   = "localhost";
	$username   = $username;
	$password    = $password;
    $dbname   = $database;
	$inputfilename =$filename;
	$exceldata = array();

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//  Read your Excel workbook
try
{
    $inputfiletype = PHPExcel_IOFactory::identify($inputfilename);
    $objReader = PHPExcel_IOFactory::createReader($inputfiletype);
    $objPHPExcel = $objReader->load($inputfilename);
}
catch(Exception $e)
{
    die('Error loading file "'.pathinfo($inputfilename,PATHINFO_BASENAME).'": '.$e->getMessage());
}

//  Get worksheet dimensions
$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); 
$highestColumn = $sheet->getHighestColumn();

//  Loop through each row of the worksheet in turn
for ($row = 2; $row <= $highestRow; $row++)
{ 

    //  Read a row of data into an array
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
	//$rowData[0][7]=date('Y-m-d',PHPExcel_Shared_Date::ExcelToPHP($rowData[0][7]));
	//$rowData[0][8]=date('Y-m-d',PHPExcel_Shared_Date::ExcelToPHP($rowData[0][8]));
    //  Insert row data array into your database of choice here
	$sql = "INSERT INTO staff(empid,empname,position,joindate,reldate,contry,city,pstatus,ptype)
 
			VALUES ('".$rowData[0][0]."','".$rowData[0][1]."','".$rowData[0][2]."','".$rowData[0][3]."','".$rowData[0][4]."','".$rowData[0][5]."','".$rowData[0][6]."','".$rowData[0][7]."', '".$rowData[0][8]."')";
	
	if (mysqli_query($conn, $sql)) {
		$exceldata[] = $rowData[0];
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

/*
// Print excel data
echo "<table>";
foreach ($exceldata as $index => $excelraw)
{
	echo "<tr>";
	foreach ($excelraw as $excelcolumn)
	{
		echo "<td>".$excelcolumn."</td>";
	}
	echo "</tr>";
}
echo "</table>";
*/

mysqli_close($conn);
?>