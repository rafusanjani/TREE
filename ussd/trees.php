  
<?php 
require('sql_connection.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/app.css">
</head>
<body>

	<?php

	  $records = $sqliCon->query("SELECT phone_number, name, number_of_trees FROM members,trees WHERE trees.member_id = members.id");

	 ?>

	<div class="container">

		<h2>Conservation of the environment</h2>
		<hr>
		<table class="table">

			<thead>
				<th>Phone Number</th> <th>Name</th> <th>Sum trees</th>
			</thead>

			<tbody>
				 <?php

				   if($records){

				   	 foreach ($records as $key => $value) {

				   	 	$phone = $value["phone_number"];
				   	 	$name = $value["name"];
				   	 	$total = $value["number_of_trees"];
				   	 	 echo "
				   	 	 <tr> 
				   	 	    <td>$phone </td>
				   	 	    <td>$name </td>
				   	 	    <td>$total </td>
 
				   	 	  </tr>
				   	 	 ";
				   	 }




				   }else{
				   	echo "Bad queery: ".$sqliCon->error;
				   } 


				  ?>
			</tbody>


		</table>
	</div>



</body>
</html>
