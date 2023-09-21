<?php
// Include necessary files and configurations
include('./resourses/database.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Delete user data from the database
    $sql = "DELETE FROM userd WHERE ID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
}

// Redirect back to the user list page
header('Location: friendlist.php');
exit();
?>
