<?php
include("Cls_employees.php");
include("dbconnection.php");
?>
<html>

<head>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="DataTables/css/dataTables.bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="DataTables/css/buttons.bootstrap.min.css"/>
<script src="js/jquery.min.js"></script>
 <script type="text/javascript" src="DataTables/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="js/buttons.bootstrap.min.js"></script>

<script type="text/javascript" src="
https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="
https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>

<script type="text/javascript" src="
https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

<script type="text/javascript" src="js/buttons.html5.min.js"></script>
<script type="text/javascript" src="js/buttons.print.min.js"></script>
<script type="text/javascript" src="js/buttons.colVis.min.js"></script>
<style>

</style>


</head>
<body>
<h2 align='center'>EMPLOYEE DETAILS</h2><br/><br/><br/><br/>
<table id="example" class="display" style="width:100%" style='margin:5px' class='cell-border compact stripe'>
        <thead>
            <tr>			
		
                <th>Empid</th>
                <th>Empname</th>
                <th>Postion</th>
                <th>Joing Date</th>
                <th>Releasing Date</th>
                <th>Contry</th>				
				<th>City</th>
                <th>Paymentstatus</th>
                <th>Paymenttype
        </thead>
        <tbody>
		
						<?php
											listRecords();
											?>					
          
           	
											
       
        <!--
		<tfoot>
		
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
		-->
    </table>
</body>
<script type='text/javascript'>



$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );


/*
$(document).ready(function() {
    var table = $('#example').DataTable( {
        lengthChange: false,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
    } );
 
    table.buttons().container()
        .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
} );

*/
</script>
</html>

<?php
	
//Global varibles
	$row;
	//Display Footwear list
	function listRecords()
	{
		$obj=new Cls_employees();  
		$data=$obj->listRecords();
			 
		 foreach($data as $row) 
		 {
		/*
		empid
empname
position
joindate
reldate
contry
city
pstatus
ptype

*/
		
			
				echo '<tr>';
				echo "<td >$row[empid]</td>";	
				echo "<td >$row[empname]</td>";	
				echo "<td >$row[position]</td>";					
				echo "<td >$row[joindate]</td>";	
				echo "<td >$row[reldate]</td>";	
				echo "<td >$row[contry]</td>";	
				echo "<td >$row[city]</td>";	
				echo "<td >$row[pstatus]</td>";	
				
				echo "<td >$row[ptype]</td>";
				
				
							
				echo "</tr>";
		   
		 }
		
	
	}
	
?>