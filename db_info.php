<?php
// Database credentials
define('DB_SERVER', 'localhost');  // MySQL server address
define('DB_USERNAME', 'your_username');  // MySQL username
define('DB_PASSWORD', 'your_password');  // MySQL password
define('DB_NAME', 'presentation');  // Database name

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
