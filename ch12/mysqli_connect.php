<?php

// This file contains the database access information,
// This file also establishes a connection to MySQL,
// selects the database, and sets the encoding.
// And this file should not be contained in the site directory in real circumstance.

// Set the database access information as constants:
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', '');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'sitename');

// Make the connection:
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error());

// Set the encoding...
mysqli_set_charset($dbc, 'utf8');