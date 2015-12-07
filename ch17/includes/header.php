<?php
/* This script...
 * - starts the HTML template.
 * - indicates the encoding using header().
 * - starts the session.
 * - gets the language-specific words from the database.
 * - lists the available languages.
 */

// Indicate the encoding:
header('Content-Type: text/html; charset=UTF-8');

// Start the session:
session_start();

// For testing purposes:
$_SESSION['user_id'] = 1;
$_SESSION['user_tz'] = 'America/New_York';
// For logging out:
//$_SESSION = array();

// Need the database connection:
require('./mysqli_connect.php');

// Check for a new language ID...
// Then store the language ID in the session:
if (isset($_GET['lid']) && filter_var($_GET['lid'], FILTER_VALIDATE_INT, array('min_range' => 1))) {
    $_SESSION['lid'] = $_GET['lid'];
}
elseif (!isset($_SESSION['lid'])) {
    $_SESSION['lid'] = 1;   // Default.
}

// Get the words for this language:
$q = "SELECT * FROM words WHERE lang_id = {$_SESSION['lid']}";
$r = mysqli_query($dbc, $q);
if (mysqli_num_rows($r) == 0) { // Invalid language ID!
    
    // Use the default language:
    $_SESSION['lid'] = 1;   // Default.
    $q = "SELECT * FROM words WHERE lang_id = {$_SESSION['lid']}";
    $r = mysqli_query($dbc, $q);

}

// Fetch the results into a variable:
$words = mysqli_fetch_array($r, MYSQLI_ASSOC);

// Free the results:
mysqli_free_result($r);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $words['title']; ?></title>
    <style type="text/css">
    body { background-color: #ffffff; }
    .content {
        background-color: #f5f5f5;
        padding: 10px;
        margin: 10px;
    }

    a.navlink.link {
        color: #003366;
        text-decoration: none;
    }
    a.navlink:visited {
        color: #003366;
        text-decoration: none;
    }
    a.navlink:hover {
        color: #cccccc;
        text-decoration: none;
    }

    .title {
        font-size: 24px; font-weight: normal; color: #ffffff;
        margin-top: 5px; margin-bottom: 5px; margin-left: 5px;
        padding: 5px 0 5px 20px;
    }
    </style>
</head>
<body>
    
<table width="90%" border="0" cellspacing="10" cellpadding="0" align="center">
    
    <tr>
        <td colspan="2" bgcolor="#003366" align="center"><p class="title"><?php echo $words['title']; ?></p></td>
    </tr>

    <tr>
    <td valign="top" nowrap="nowrap" width="10%"><b>
<?php   // Display links:

// Default links:
echo '<a href="index.php" class="navlink">' . $words['home'] . '</a><br/>
<a href="forum.php" class="navlink">' . $words['forum_home'] . '</a><br/>';

// Display links based upon login status:
if (isset($_SESSION['user_id'])) {
    
    // If this is the forum page, add a link for posting new threads:
    if (basename($_SERVER['PHP_SELF']) == 'forum.php') {
        echo '<a href="post.php" class="navlink">' . $words['new_thread'] . '</a><br/>';
    }

    // Add the logout link:
    echo '<a href="logout.php" class="navlink">' . $words['logout'] . '</a><br/>';

}
else {

    // Register and login links:
    echo '<a href="register.php" class="navlink">' . $words['register'] . '</a><br/>
    <a href="login.php" class="navlink">' . $words['login'] . '</a><br/>';

}

// For choosing a forum/language:
echo '</b><p><form action="forum.php" method="get">
<select name="lid">
<option value="0">' . $words['language'] . '</option>';

// Retrieve all the languages...
$q = "SELECT lang_id, lang FROM languages ORDER BY lang_eng ASC";
$r = mysqli_query($dbc, $q);
if (mysqli_num_rows($r) > 0) {
    while ($menu_row = mysqli_fetch_array($r, MYSQLI_NUM)) {
        echo "<option value=\"$menu_row[0]\">$menu_row[1]</option>\n";
    }
}
mysqli_free_result($r);

echo '</select><br/>
<input name="submit" type="submit" value="' . $words['submit'] . '">
</form></p>
    </td>

    <td valign="top" class="content">';
?>