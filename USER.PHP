<?php 
// Database configuration 
$servername = "localhost"; 
$username = "root"; // Your MySQL username 
$password = ""; // Your MySQL password 
$database = "user15"; // Your database name 
// Create connection 
$conn = mysqli_connect($servername, $username, $password, $database); 
// Check connection 
if (!$conn) { 
die("Connection failed: " . mysqli_connect_error()); 
} 
// SQL query to fetch usernames and passwords 
$sql = "SELECT username, password FROM users"; 
$result = mysqli_query($conn, $sql); 
if (mysqli_num_rows($result) > 0) { 
// Output data of each row 
while ($row = mysqli_fetch_assoc($result)) { 
echo "Username: " . $row["username"] . " - Password: " . $row["password"] . 
"<br>"; 
} 
}  
else { 
echo "0 results"; 
} 
// Close connection 
mysqli_close($conn); ?>