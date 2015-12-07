<?php
// This page begins the session, the HTML page, and the layout table.

session_start();    // Start the session.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo (isset($page_title)) ? $page_title : 'Welcome!'; ?></title>
</head>
<body>
<table cellspacing="0" cellpadding="0" border="0" align="center" width="600">
    <tr>
        <td align="center" colspan="3"><img src="images/title.jpg" width="600" height="61" border="0" alt="title"></td>
    </tr>
    <tr>
        <td><a href="index.php"><img src="images/home.jpg" width="200" height="39" border="0" alt="home page"></a></td>
        <td><a href="browse_prints.php"><img src="images/prints.jpg" width="200" height="39" border="0" alt="view the prints"></a></td>
        <td><a href="view_cart.php"><img src="images/cart.jpg" width="200" height="39" border="0" alt="view your cart"></a></td>
    </tr>
    <tr>
        <td align="left" colspan="3" bgcolor="#ffffcc"><br/>