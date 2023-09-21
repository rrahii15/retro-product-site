<?php
// Include necessary files and configurations
include('./resourses/database.php');
include('./resourses/header.php');

// Fetch user data from the database
$sql = "SELECT * FROM userd";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container mt-5">
    <h2 class="mb-4">User List</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th> 
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['ID'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['password'] ?></td> 
                    <td><?= $user['email'] ?></td>
                    <td>
                        <a href="editfriend.php?id=<?= $user['ID'] ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="deletefriend.php?id=<?= $user['ID'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="mt-3">
        <a href="addfriend.php" class="btn btn-success">Add User</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
</div>
<?php include('./resourses/footer.php'); ?>
