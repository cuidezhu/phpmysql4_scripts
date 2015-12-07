<?php
// This script is called via Ajax from login.php.
// This script expects to receive tow values in the URL: an email address and a password.
// This script returna a string indicating the results.

// Need two pieces of information:
if (isset($_GET['email'], $_GET['password'])) {
    
    // Need a valid email address:
    if (filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
        
        // Must match specific values:
        if ( ($_GET['email'] == 'email@example.com') && ($_GET['password'] == 'testpass') ) {
            
            // Set a cookie, if you want, or start a session.

            // Indicate success:
            echo 'CORRECT';
        }
        else {  // Mismatch!
            echo 'INCORRECT';
        }
    }
    else {  // Invalid email address!
        echo 'INVALID_EMAIL';
    }

}
else {  // Missing one of the two variables!
    echo 'INCOMPLETE';
}

?>