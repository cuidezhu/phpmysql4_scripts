<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Constants</title>
</head>
<body>
<?php

// Set today's date as a constant
define('TODAY', 'October 9, 2015');

// Print a message, using predefined constants and the TODAY constant:
echo '<p>Today is ' . TODAY . '.<br /> This server is running version <b>' . PHP_VERSION . '</b> of PHP on the <b>' . PHP_OS . '</b> operating system.</p>';
?>
</body>
</html>