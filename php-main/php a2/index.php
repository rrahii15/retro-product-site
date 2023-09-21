<?php
// Include the header file
include './resources/header.php';
?>

<main>
<!-- Start of main content -->

<section class="hero-banner">
    <div class="hero-content">
        <!-- Display welcome message -->
        <h1>Welcome to PlayPalace!</h1>
    </div>
</section>
<br>
<div class="container bg-white p-4">
    <!-- Login form -->
    <h2>Login</h2>
    <form method="post" action="login.php">
        <!-- Username field -->
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <!-- Password field -->
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <!-- Login button -->
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
<br>
<div class="container bg-white p-4">
    <!-- Registration form -->
    <h2>Register</h2>
    <form method="post" action="register_user.php">
        <!-- Username field -->
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <!-- Password field -->
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <!-- First name field -->
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>
        </div>
        <!-- Last name field -->
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>
        </div>
        <!-- Email field -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <!-- Register button -->
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <p></p>
</div>

</main>
<!-- End of main content -->
<br>
<?php
// Include the footer file
include './resources/footer.php';
?>
