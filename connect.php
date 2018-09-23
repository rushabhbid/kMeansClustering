<style>

body: {
	background-color: aqua;
	padding: 2em;
}

div: {
	padding: 2em;
	text-align: center;
}

legend: {
	font-size: 2em;
	font-family: castellar;
}

table: {
	border: 2px outset black;
	border-radius: 5px;
}



</style>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "states";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?> 