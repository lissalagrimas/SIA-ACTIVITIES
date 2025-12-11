<?php 
$servername = "localhost"; 
$username = "root"; 
$password = "CCS-L1"; 
$dbname = "product_db"; 
// Create connection 
$conn = new mysqli($servername, $username, $password, $dbname); 
// Check connection 
if ($conn->connect_error) { 
die("Connection failed: " . $conn->connect_error); 
} 
?>