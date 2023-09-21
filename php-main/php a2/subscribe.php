<?php
// Include the database connection file
include './resources/database.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the name and email from the form
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Prepare an SQL query to insert the name and email into the subscriptions table
    $sql = "INSERT INTO subscriptions (name, email) VALUES (?, ?)";
    $stmt= $pdo->prepare($sql);
    // Execute the query with the name and email
    $stmt->execute([$name, $email]);

    // Redirect the user to the index.php page
    header("Location: index.php");
    // Stop further execution of the script
    exit();
}
?>
