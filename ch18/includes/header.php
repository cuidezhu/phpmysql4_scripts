<?php
// This page begins the HTML header for the site.

// Start output buffering:
ob_start();

// Initialize a session:
session_start();

// Check for a $page_title value:
if (!isset($page_title)) {
    $page_title = 'User Registration';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $page_title; ?></title>
    <style type="text/css" media="screen">@import "includes/layout.css";</style>
</head>
<body>
<div id="Header">User Registration</div>
    <div id="Content">
<!-- End of Header -->