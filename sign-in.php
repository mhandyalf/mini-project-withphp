<?php
// Function to establish a database connection
function connectToDatabase() {
  $dbHost = "localhost"; 
  $dbUser = "root"; 
  $dbPass = ""; 
  $dbName = "handygames75"; 

  $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  return $conn;
}

// Function to perform the login check
function login() {
  // Check if the form was submitted
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Sanitize the input to prevent SQL injection (you should consider more secure methods)
    $username = addslashes($username);
    $password = addslashes($password);

    // Connect to the database
    $conn = connectToDatabase();

    // Perform the query to check if the user exists and the password is correct
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($query);

    if ($result->num_rows === 1) {
      // User exists, check the password
      $user = $result->fetch_assoc();
      if ($user['password'] == $password) {
        header("Location: http://localhost/miniproject-phase0/index.html");
        exit;
      }
      
            
    }
    // Login failed, redirect back to the login page (sign-in.html)
    header("Location: http://localhost/miniproject-phase0/sign-in.html");
    exit;
  }
}

// Call the login function to check the credentials when the form is submitted
login();
?>
