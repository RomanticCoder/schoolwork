<?php

//set default value of variables for initial page load
if (!isset($fname)) {
    $fname = '';
}
if (!isset($fpassword)) {
    $fpassword = '';
}
if (!isset($femail)) {
    $femail = '';
}
if (!isset($fage)) {
    $fage = '';
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Globo-Gym sign-up form</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main>
        <div class="page_information">
            <img src="images/gym_logo.png" class="img-logo" alt="gym_logo">
            <h1>Globo-Gym Membership</h1>
            <h2>Sign-up Information</h2>

        </div>
        <!-- form to transmit the application data -->
        <form action="application_success.php" method="post">
            <div id="application_form">
                <label for="fname">Name: </label>
                <?php
                //This code checks to see if we got an error message from the application_success.php page
                if (!empty($fname_error)) { ?>
                    <p class="error"><?php echo htmlspecialchars($fname_error); ?></p>
                <?php } ?>
                <input type="text" name="fname" value="<?php echo htmlspecialchars($fname); ?>">
                <br />

                <label for="fpassword">Password: </label>
                <?php
                if (!empty($fpassword_error)) { ?>
                    <p class="error"><?php echo htmlspecialchars($fpassword_error); ?></p>
                <?php } ?>
                <input type="password" name="fpassword" value="<?php echo htmlspecialchars($fpassword); ?>">
                <br />

                <label for="femail">Email: </label>
                <?php
                if (!empty($femail_error)) { ?>
                    <p class="error"><?php echo htmlspecialchars($femail_error); ?></p>
                <?php } ?>
                <input type="email" name="femail" value="<?php echo htmlspecialchars($femail); ?>">
                <br />

                <label for="fage">Age: </label>
                <?php
                if (!empty($fage_error)) { ?>
                    <p class="error"><?php echo htmlspecialchars($fage_error); ?></p>
                <?php } ?>
                <input type="number" name="fage" value="<?php echo htmlspecialchars($fage); ?>">
                <br />

                <div class="check_locker">
                    <input type="checkbox" name="flocker">
                    <label for="flocker">Require Locker</label>
                </div>
                <br />

                <label for="flevel">Current Fitness Level</label>
                <input type="range" name="flevel" min="0" max="100">
                <br />

                <input class="btn" type="submit" value="Submit">
            </div>
        </form>


    </main>
</body>

</html>