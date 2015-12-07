<?php
// This is the main page for the site.

// Include the HTML heaer:
include('includes/header.php');

// The content on this page is introductory text
// pulled from the database, based upon the
// selected language:
echo $words['intro'];

// Include the HTML footer file:
include('includes/footer.php');
?>