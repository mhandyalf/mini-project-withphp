<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace these variables with your actual database credentials
    $servername = "localhost"; // Database server name
    $username = "root"; // Database username
    $password = ""; // Database password
    $dbname = "handygames75"; // Database name

    // Retrieve the product data from the form
    $category = $_POST['category'];
    $image_url = $_POST['image_url'];
    $product_name = $_POST['product_name'];

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL query to insert the data into the "products" table
    $sql = "INSERT INTO products (category, image_url, product_name) VALUES ('$category', '$image_url', '$product_name')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Data insertion successful
        echo "Product submitted successfully!";
    } else {
        // Error in data insertion
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
