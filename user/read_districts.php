<?php
require('sql_connection.php');

$results = $sql_connection->query("SELECT ID, NAME FROM districts ORDER BY ID ASC");

foreach ($results as $key => $value) {

	$id = $value["ID"];
	$name = $value["NAME"];

	echo "
	<tr> 
	   <td> $id </td>
	   <td> $name </td>
	</tr>
	";
	 
}