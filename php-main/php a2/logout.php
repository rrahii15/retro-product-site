<?php
// Start a new session or resume the existing one
session_start();

// Destroy all data registered to the session
session_destroy();

// Redirect the user to the index.php page
header("Location: index.php");

// Terminate the current script
exit();
?>
