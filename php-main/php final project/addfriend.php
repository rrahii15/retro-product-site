<?php
include('./resourses/database.php');
// Including database and header file
include('./resourses/header.php');

$errors = [];
$username = '';
$password = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Validate form data
    if (empty($username) || empty($password) || empty($email)) {
        $errors[] = "Username, password, and email are required.";
    } else {
        // For security, hash the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Insert user data into the database
        $sql = "INSERT INTO userd (username, password, email) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $hashed_password, $email]);

        // Redirect back to the user list page
        header('Location: friendlist.php');
        exit();
    }
}
?>
<!-- Form for adding user -->
<div class="container mt-5">
    <h2 class="mb-4">Add User</h2>
    <form method="post" action="addfriend.php">
        <div class="form-group">
            <!-- form fields -->
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
            <button type="submit" class="btn btn-success">Add User</button>
        </div>
    </form>
    <!-- error handling -->
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
<!-- Insert footer -->
<?php include('./resourses/footer.php'); ?>
