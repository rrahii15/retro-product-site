<?php
// file with validation
function validateRegistrationForm($username, $password, $email, $name, $age, $gender, $dob) {
    $errors = [];

    if (empty($username)) {
        $errors[] = "Username is required.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]{5,20}$/', $username)) {
        $errors[] = "Username must be between 5 and 20 characters, containing only letters, numbers, and underscores.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    if (empty($age)) {
        $errors[] = "Age is required.";
    } elseif (!is_numeric($age) || $age < 1 || $age > 150) {
        $errors[] = "Invalid age.";
    }

    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }

    if (empty($dob)) {
        $errors[] = "Date of Birth is required.";
    }

    return $errors;
}

?>
