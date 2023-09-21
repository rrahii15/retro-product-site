<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <!-- now it is responsive to all size displays -->
    <title>Week 2 - Pizza Order Form</title>
    <meta name="coder" content="Aryan Uknai">
    <meta name="robots" content="noindex,nofollow">
    <link rel="stylesheet" href="./CSS/style.css">

    <?php
    // using if to check that form is submmitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Get the form data
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $contact = $_POST["contact"];
        $email = $_POST["email"];
        $pizzaSize = $_POST["pizzaSize"];
        $toppings = $_POST["toppings"];
        $sauce = $_POST["sauce"];
        $quantity = $_POST["quantity"];
        $instructions = $_POST["instructions"];
        //varible created

        // after form is created it will display data
        echo "<h2>Your Order Summary:</h2>";
        echo "<p><strong>First Name:</strong> $firstName</p>";
        echo "<p><strong>Last Name:</strong> $lastName</p>";
        echo "<p><strong>Contact:</strong> $contact</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Pizza Size:</strong> $pizzaSize</p>";
        echo "<p><strong>Toppings:</strong> ";
        foreach ($toppings as $topping) {
            echo "$topping, ";//creating string 
        }
        echo "</p>";
        echo "<p><strong>Sauce:</strong> $sauce</p>";
        echo "<p><strong>Quantity:</strong> $quantity</p>";
        echo "<p><strong>Special Instructions:</strong> $instructions</p>";
    } else{
    ?>
</head>
<!-- body is in else so form will be shown -->
<!-- starts body -->
<body>
    <!-- header -->
    <header>
        <h1 class="title">
            Sam's Pizza
        </h1>
    </header>
    <!-- main part -->
    <main>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

            <section class="media1">
                <img src="./img/pexels-athena-2323183-photoaidcom-cropped.jpg" alt="pizza img" id="image_attributes">
            </section>

            <fieldset>
                <!-- used fieldset to give a border -->
                <legend>Let's Create Your Favorite Pizza</legend>
                <!-- general line for buyers -->

                <!-- section 1 for personal details -->
                <section class="personaldetails">
                    <label class="headings"><strong>First Name:</strong> </label>
                    <input type="text" required autofocus placeholder="First Name" name="firstName">
                    <!-- first name input --> <br>

                    <label class="headings"><strong>Last Name:</strong> </label>
                    <input type="text" required placeholder="Last Name" name="lastName">
                    <!-- last name -->

                    <br>
                    <!-- Contact Number  -->
                    <label class="headings"><strong> Contact:</strong> </label>
                    <input type="tel" placeholder="Format: 1234567890" required name="contact">
                    <br>
                    <!-- email -->
                    <label class="headings"><strong> Email: </strong> </label>
                    <input type="email" placeholder="johni@mail.com" required name="email">
                </section><br>

                <!-- section 2 for pizza choice -->
                <section class="pizzachoice">
                    <!-- size selection -->
                    <label class="headings">Choose Pizza:</label>
                    <select name="pizzaSize" id="size" required>
                        <option value="">Select a size</option>
                        <option value="slice">A slice</option>
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                        <option value="xLarge">Extra Large</option>
                    </select><br>

                    <!-- toppings select -->
                    <label class="headings">Toppings:</label>
                    <div>
                        <input type="checkbox" id="pepperoni" name="toppings[]" value="Pepperoni">
                        <label for="pepperoni">Pepperoni</label>
                    </div>
                    <div>
                        <input type="checkbox" id="mushrooms" name="toppings[]" value="Mushrooms">
                        <label for="mushrooms">Mushrooms</label>
                    </div>
                    <div>
                        <input type="checkbox" id="olives" name="toppings[]" value="Olives">
                        <label for="olives">Olives</label>
                    </div>
                    <div>
                        <input type="checkbox" id="panner" name="toppings[]" value="Panner">
                        <label for="panner">Panner</label>
                    </div><br>

                    <!-- radio buttons for sauce selection -->
                    <div class="sauce">
                        <label class="headings"><strong>Choose a Sauce:</strong></label>
                        <br>
                        <input type="radio" name="sauce" value="Pizza Sauce" checked>
                        <label>Pizza Sauce&nbsp;</label><br>
                        <input type="radio" name="sauce" value="BBQ Sauce">
                        <label>BBQ Sauce&nbsp;</label><br>

                        <input type="radio" name="sauce" value="Hearty Marinara Sauce">
                        <label>Hearty Marinara Sauce&nbsp;</label><br>
                        <input type="radio" name="sauce" value="Ranch Dressing">
                        <label>Ranch Dressing&nbsp;</label><br>
                        <input type="radio" name="sauce" value="Garlic Sauce">
                        <label>Garlic Sauce&nbsp;</label><br><br>
                    </div>

                    <label><strong>Quantity:</strong></label>
                    <input type="number" placeholder="example: 1" name="quantity">
                    <br><br>

                    <!-- any note they want to put -->
                    <label for="instructions">Special Instructions:</label><br>
                    <textarea id="instructions" name="instructions" rows="4"></textarea>
                </section>

                <input type="submit" value="ORDER NOW!" class="submit">
            </fieldset>
        </form>
        <?php
    }
        ?>
    </main>
    <!-- footer -->
    <footer>
        <p><a href="+1(705)5551111">Contact us</a> || <a href="samspizza12@gmail.com">Mail inquiry</a></p>
        <p>© All rights reserved</p>
    </footer>
</body>

</html>
