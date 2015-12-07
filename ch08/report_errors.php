<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporting Errors</title>
</head>
<body>
<h2>Testing Error Reporting</h2>
<?php

// Flag variable for site status:
define('LIVE', FALSE);

// Create the error handler:
function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars) {

    // Build the error message:
    $message = "An error occurred in script '$e_file' on line $e_line: $e_message\n";

    // Append $e_vars to $messages:
    $message .= print_r($e_vars, 1);

    if(!LIVE) { // Development (print the error).
        echo '<pre>' . $message . "\n";
        debug_print_backtrace();
        echo '</pre><br>';
    }
    else {  // Don't show the error.
        echo '<div class="error">A system error occurred. We apologize for the inconvenience.</div><br>';
    }

}   // End of my_error_handler() definition.

// Use my error handler:
set_error_handler('my_error_handler');

// Create errors:
foreach ($val as $v) {}
$result = 1/0;

?>
</body>
</html>