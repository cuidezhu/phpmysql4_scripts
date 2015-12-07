<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Feedback</title>
</head>
<body>
<?php

// Print the submitted information:
if ( !empty($_POST['name']) && !empty($_POST['comments']) && !empty($_POST['email']) ) {
    echo "<p>Thank you, <b>{$_POST['name']}</b>, for the following comments:<br>
    <kbd>{$_POST['comments']}</kbd></p>
    <p>We will reply to you at <i>{$_POST['email']}</i>.</p>\n";
} else {
    echo '<p>Please go back and fill out the form again.</p>'  ;
}

?>
</body>
</html>