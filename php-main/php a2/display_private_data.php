<?php
// Start a new session or resume the existing one
session_start();

// Check if the user is logged in, if not redirect them to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Include the database connection file
include './resources/database.php';

// Prepare an SQL query to select all records from the cart_details table
$sql = "SELECT * FROM cart_details";
$stmt= $pdo->prepare($sql);
// Execute the query
$stmt->execute();
// Fetch all the records and store them in the $cart_details variable
$cart_details = $stmt->fetchAll();

// Include the header file
include './resources/header.php';
?>

<!-- HTML for displaying user-specific data -->
<div class="container bg-white p-4">
    <!-- Display a welcome message with the user's username -->
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
    <p>This is some private data just for you.</p>
    <!-- Display the user's cart details -->
    <h3>Your Cart Details</h3>
    <table class="table">
        <!-- Table headers -->
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <!-- Table body -->
        <tbody>
            <!-- Loop through each record in $cart_details and create a table row for each one -->
            <?php foreach ($cart_details as $detail): ?>
                <tr>
                    <td><?php echo $detail['product_name']; ?></td>
                    <td><?php echo $detail['quantity']; ?></td>
                    <td><?php echo $detail['price']; ?></td>
                    <td><?php echo $detail['total']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- Logout button -->
    <a href="logout.php" class="btn btn-primary">Logout</a>
</div>

<?php
// Include the footer file
include './resources/footer.php';
?>
