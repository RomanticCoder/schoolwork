<?php
// get the data from the form
$investment = filter_input(
    INPUT_POST,
    'investment',
    FILTER_VALIDATE_FLOAT
);
$years =  filter_input(
    INPUT_POST,
    'years',
    FILTER_VALIDATE_INT
);
//This should be replaced with a proper filter_input method call

//Here is where you should create the add the interest_rate variable and get it via the filter_input method
$interest_rate = filter_input(INPUT_POST, 'interest_rate', FILTER_VALIDATE_FLOAT);

// validate investment
if (empty($investment)) {
    $error_message = 'Investment must be a valid number.';
} else if ($investment <= 0) {
    $error_message = 'Investment must be greater than zero.';
} else {
    if (empty($interest_rate)) {
        $error_message = 'Interest rates must be a valid number.';
    } else if ($interest_rate <= 0) {
        $error_message = 'Interest rates must be greater than zero.';
    } else {
        if (empty($years)) {
            $error_message = 'Years must be a valid number.';
        } else if ($years <= 0 || $years >= 50) {
            $error_message = 'Years must be greater than zero and less than 50.';
        } else {
            $error_message = '';
        }
    }
}

// if an error message exists, go to the index page
if (!empty($error_message)) {
    //This redirects us to the index.php page again and displays the error_message
    include('index.php');
    exit();
}

// calculate the future value
$future_value = $investment;
for ($i = 1; $i <= $years; $i++) {
    $future_value += $future_value * $interest_rate * .01;
}

// Here is where you should set the correct currency and percent formatting
$investment_f = "$" . number_format($investment, 2); //replace this empty string with the correct number_format call
$yearly_rate_f = $interest_rate . "%"; //replace this empty string with the correct number_format call
$future_value_f = "$" . round($future_value, 2); //replace this empty string with the correct number_format call
?>

<!DOCTYPE html>
<html>

<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>
    <main>
        <h1>Future Value Calculator</h1>

        <label>Investment Amount:</label>
        <span><?php echo $investment_f; ?></span><br>

        <label>Yearly Interest Rate:</label>
        <span><?php echo $yearly_rate_f; ?></span><br>

        <label>Number of Years:</label>
        <span><?php echo $years; ?></span><br>

        <label>Future Value:</label>
        <span><?php echo $future_value_f; ?></span><br>

        <div id="buttons">
            <button onclick="document.location='index.php'">Try Again</button>
        </div>
    </main>
</body>

</html>