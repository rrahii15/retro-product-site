<?php
// Include the database connection file
include './resources/database.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the username, password, first name, and email from the form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];

    // Hash the password using PHP's built-in function
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare an SQL query to insert the username, hashed password, first name, and email into the users table
    $sql = "INSERT INTO users (username, password, firstname, email) VALUES (?, ?, ?, ?)";
    $stmt= $pdo->prepare($sql);
    // Execute the query with the username, hashed password, first name, and email
    $stmt->execute([$username, $hashed_password, $firstname, $email]);

    // Redirect the user to the login page
    header("Location: login.php");
    // Stop further execution of the script
    exit();
}

// Include the header file
include './resources/header.php';
?>

<!-- HTML form for user registration -->
<div class="container bg-white p-4">
    <h2>Register</h2>
    <form method="post" action="register_user.php">
        <!-- Input fields for username, password, first name, last name, and email -->
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <!-- Submit button for the form -->
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <p></p>
</div>

<?php
// Include the footer file
include './resources/footer.php';
?>
