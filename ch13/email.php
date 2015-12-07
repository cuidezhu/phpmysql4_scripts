<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Me</title>
</head>
<body>
<h1>Contact Me</h1>
<?php
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    /* This function takes one argument: a string.
     * The function returns a clean version of the string.
     * The clean version may be either an empty string or
     * just teh removal of all newline characters.
     */
    function spam_scrubber($value) {

        // List of very bad values:
        $very_bad = array('to:', 'cc:', 'bcc:', 'content-type:', 'mime-version:', 'multipart-mixed:', 'content-transfer-encoding:');

        // If any of the very bad strings are in
        // the submitted value, return an empty string:
        foreach ($very_bad as $v) {
            if (stripos($value, $v) != false) {
                return '';
            }
        }

        // Replace any newline characters with spaces:
        $value = str_replace(array('\r', "\n", "\%0a", "\%0d"), ' ', $value);

        // Return the value:
        return trim($value);
    }   // End of spam_scrubber() function.

    // Clean the form data:
    $scrubber = array_map('spam_scrubber', $_POST);

    // Minimal form validation:
    if (!empty($scrubbed['name']) && !empty($scrubbed['email']) && !empty($scrubbed['comments'])) {
        
        // Create the body:
        $body = "Name: {scrubbed['name']}\n\nComments: {$scrubbed['comments']}";

        // Make it no longer than 70 characters long:
        $body = wordwrap($body, 70);

        // Send the email:
        mail('your_email@example.com', 'Contact Form Submission', $body, "From: {$scrubbed['email']}");

        // Print a message:
        echo '<p><em>Thank you for contacting me. I will reply some day.</em></p>';

        // Clear $_POST (so that the form 's not sticky);
        $_POST = array();

    }
    else {
        echo '<p style="font-weight: bold; color: #C00">Please fill out the form completely.</p>';
    }
    
}   // End of main isset() IF.

// Create the HTML form:
?>
<p>Please fill out this form to contact me.</p>
<form action="email.php" method="post">
    <p>Name: <input type="text" name="name" size="30" maxlength="60" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>"></p>
    <p>Email Address: <input type="text" name="email" size="30" maxlength="80" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"></p>
    <p>Comments: <textarea name="comments" rows="5" cols="30"><?php if (isset($_POST['comments'])) echo $_POST['comments']; ?></textarea></p>
    <p><input type="submit" name="submit" value="Send!"></p>
</form>
</body>
</html>