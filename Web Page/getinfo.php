<?php
// Get a connection for the database
require_once('C:\wamp64\www\mysqli_connect.php');
// Create a query for the database
$query = "SELECT * FROM zest;";
// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);
// If the query executed properly proceed
$number_of_rows = mysqli_num_rows($response);
$temp_array =array();
if($number_of_rows > 0)
{
	while($row = mysqli_fetch_assoc($response)){
		$temp_array[] = $row;
	}
}
header('Content-Type: application/json');
echo json_encode(array("Users"=>$temp_array));
mysqli_close($dbc);
?>
