<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" type="text/css" href="includes/style.css">
</head>
<body>
<div id="header">
    <h1>Your Website</h1>
    <h2>catchy slogan...</h2>
</div>
<div id="navigation">
    <ul>
        <li><a href="index.php">Home Page</li>
        <li><a href="register.php">Register</a></li>
        <li><a href="view_users.php">View Users</a></li>
        <li><a href="password.php">Change Password</a></li>
        <li>
            <?php
            if (isset($_SESSION['user_id'])) {
                echo '<a href="logout.php">Logout</a>';
            }
            else {
                echo '<a href="login.php">Login</a>';
            }
            ?>
        </li>
    </ul>
</div>
<div id="content">  <!-- Start of the page-specific content. -->