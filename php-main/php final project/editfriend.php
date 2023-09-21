<?php
// Include necessary files and configurations
include('./resourses/database.php');
include('./resourses/header.php');

$errors = [];
$username = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Validate form data
    if (empty($username) || empty($email)) {
        $errors[] = "Username and email are required.";
    } else {
        // Update user data in the database
        $sql = "UPDATE userd SET username = ?, email = ? WHERE ID = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $email, $id]);

        // Redirect back to the user list page
        header('Location: friendlist.php');
        exit();
    }
} elseif (isset($_GET['id'])) {
    // Data for pre-filling the form
    $id = $_GET['id'];
    $sql = "SELECT * FROM userd WHERE ID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $user = $stmt->fetch();

    if ($user) {
        $username = $user['username'];
        $email = $user['email'];
    } else {
        // If user not found, redirect to the user list page
        header('Location: friendlist.php');
        exit();
    }
}
?>

<div class="container mt-5">
    <h2 class="mb-4">Edit User</h2>
    <!-- Form to edit user -->
    <form method="post" action="editfriend.php">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $username ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update User</button>
        </div>
    </form>
    <!-- Error handling -->
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
