<?php
// Replace these variables with your actual database credentials
$servername = "localhost"; // Database server name
$username = "root"; // Database username
$password = ""; // Database password
$dbname = "handygames75"; // Database name

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $name = $_POST['w3lName'];
    $email = $_POST['w3lSender'];
    $subject = $_POST['w3lSubject'];
    $message = $_POST['w3lMessage'];

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL query to insert the data into the "mail" table
    $sql = "INSERT INTO mail (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Data insertion successful
        echo "Form submitted successfully!";
    } else {
        // Error in data insertion
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
