<?php
// Include database connection
include('./resourses/database.php');

$username = $password = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // grabing form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate form data
    if (empty($username) || empty($password)) {
        $errors[] = "Username and password are required.";
    } else {
        // Check if the user exists in the database
        $sql = "SELECT * FROM userd WHERE username = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Successful login, start session and redirect to friendlist
            session_start();
            $_SESSION['username'] = $username;
            header('Location: friendlist.php'); 
            exit();
        } else {
            $errors[] = "Sorry, Invalid username or password.";
        }
    }
}
?>
<!-- include header -->
<?php include('./resourses/header.php'); ?>
<!-- login form -->
<div class="container mt-5">
    <h2 class="mb-4">User Login</h2>
    <form method="post" action="login.php">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $username ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>
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
