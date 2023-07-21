<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace these variables with your actual database credentials
    $servername = "localhost"; // Database server name
    $username = "root"; // Database username
    $password = ""; // Database password
    $dbname = "handygames75"; // Database name

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle the "Delete Product" form submission
    if (isset($_POST['submit_action']) && $_POST['submit_action'] === 'Delete Product') {
        // Retrieve the product ID from the form
        $product_id = $_POST['product_id'];

        // Prepare the SQL query to delete the product from the "products" table
        $sql = "DELETE FROM products WHERE product_id = '$product_id'";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            // Product deletion successful
            echo "Product deleted successfully!";
        } else {
            // Error in product deletion
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
}
?>
