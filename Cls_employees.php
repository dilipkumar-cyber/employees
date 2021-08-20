<?php
include("dbconnection.php");

class Cls_employees
   {
	   

	function __construct() 

			{

			  

			}

	/*Employees Management functions */
	/******************************************************************************/	
	/*
	Functions List 

	1.listRecords	
	
	*/		
	/******************************************************************************/
	
		
		
		function listRecords() 
		{
			/* 
				Description:Display productscategory list 				
				Module:productscategory
				Algortihm:
					a)Generate select query					
					b)execute and feach all records					
					b)Return footwears list
				
			*/
			   
			global $con;
			$listqry="select * from staff ";
			$userrecords=mysqli_query($con,$listqry);
			
		    return $userrecords;
			  
		}
		
		
		
	 


   }


?>