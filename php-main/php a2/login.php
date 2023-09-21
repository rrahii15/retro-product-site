<?php
// Include the database connection file
include './resources/database.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare an SQL query to get the user with the given username
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt= $pdo->prepare($sql);
    // Execute the query with the username
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    // If the user exists and the password is correct
    if ($user && password_verify($password, $user['password'])) {
        // Start the session and store the username in it
        session_start();
        $_SESSION['username'] = $username;
        // Redirect the user to the private data page
        header("Location: display_private_data.php");
        exit();
    } else {
        // If the login details are incorrect, show an error message
        echo "Invalid username or password";
    }
}

// Include the header file
include './resources/header.php';
?>

<!-- HTML form for user login -->
<div class="container bg-white p-4">
    <h2>Login</h2>
    <form method="post" action="login.php">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <!-- Submit button for the form -->
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <p></p>
</div>

<?php
// Include the footer file
include './resources/footer.php';
?>
