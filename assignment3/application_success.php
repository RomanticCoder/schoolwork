<?php
//get the data from the form
$fname = filter_input(INPUT_POST, 'fname');
$fpassword = filter_input(INPUT_POST, 'fpassword');
$femail = filter_input(INPUT_POST, 'femail', FILTER_VALIDATE_EMAIL);
$fage = filter_input(INPUT_POST, 'fage', FILTER_VALIDATE_INT);
$flocker = filter_input(INPUT_POST, 'flocker');
$flevel = filter_input(INPUT_POST, 'flevel');

//validate the data
if (empty($fname)) {
    $fname_error = 'name must not be empty.';
} else if (strlen($fname) <= 5) {
    $fname_error = 'name must be longer than 5 characters.';
} else {
    $fname_error = '';
}

if (empty($fpassword)) {
    $fpassword_error = 'password must not be empty.';
} else if (strlen($fpassword) <= 5) {
    $fpassword_error = 'password must be longer than 5 characters.';
} else {
    $fpassword_error = '';
}

if (empty($femail)) {
    $femail_error = 'email must not be empty.';
} else {
    $femail_error = '';
}

if (empty($fage)) {
    $fage_error = 'age must not be empty.';
} else if ($fage < 18 or $fage > 99) {
    $fage_error = 'Age must be between 18 and 99.';
} else {
    $fage_error = '';
}

// if an error message exists, go to the index page
if (!empty($fname_error) || !empty($fpassword_error) || !empty($femail_error) || !empty($fage_error)) {
    include('index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Globo-Gym application result</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <main>
        <div class="page_information">
            <h1>Successful Application</h1>
            <img src="images/profile.png" alt="profile" class="img-profile">
            <h2>Welcome <strong><?php echo $fname; ?></strong></h2>
        </div>
        <p>We will send a confirmation email to <strong><?php echo $femail; ?></strong></p>
        <p>In 2 years, by the time you turn <strong><?php echo ($fage + 2) ?></strong> years of age, we think you will fit in perfectly</p>
        <p>Considering that you have <strong><?php echo $flevel; ?></strong> of fitness level, you will be assigned to right group. <p>
    </main>
</body>

</html>