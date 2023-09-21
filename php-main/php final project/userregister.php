<?php
// Include datbase
include('./resourses/database.php');

// Define the registration function
function registerUser($username, $password, $email) {
    global $pdo;
    
    // Hashing the password for safety
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $sql = "INSERT INTO userd (username, password, email) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $hashedPassword, $email]);
}

$username = $password = $email = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Validate form data
    if (empty($username) || empty($password) || empty($email)) {
        $errors[] = "Username, password, and email are required.";
    } else {
        registerUser($username, $password, $email);

        // Redirect to a success page or login page
        header('Location: login.php'); 
        exit();
    }
}
?>

<?php include('./resourses/header.php'); ?>
<!-- include header -->

<div class="container mt-5" id="margin100">
    <!-- form for register -->
    <h2 class="mb-4">User Registration</h2>
    <form method="post" action="userregister.php">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $username ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>
<!-- include footer -->
<?php include('./resourses/footer.php'); ?>
