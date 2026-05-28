<?php
// 1. Force PHP to display all errors (Great for debugging local development)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 2. Database Configuration
$host     = 'localhost';
$db_name  = 'healthmatch_db';
$username = 'root';          // Default XAMPP username
$password = '';              // Default XAMPP password is empty
$charset  = 'utf8mb4';

// 3. Build the Connection String (DSN)
$dsn = "mysql:host=$host;dbname=$db_name;charset=$charset";

// 4. Set secure and helpful PDO options
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       
    PDO::ATTR_EMULATE_PREPARES   => false,                  
];

// 5. Attempt to connect
try {
    $pdo = new PDO($dsn, $username, $password, $options);
    
    // Visibly print success so we know it worked!
    echo "<h1>Success!</h1>";
    echo "<p>Connected smoothly to the <strong>{$db_name}</strong> database.</p>"; 
    
} catch (PDOException $e) {
    // If something goes wrong, it will print the exact problem here
    echo "<h1>Database Connection Failed</h1>";
    echo "<p>Error details: " . $e->getMessage() . "</p>";
}
?>