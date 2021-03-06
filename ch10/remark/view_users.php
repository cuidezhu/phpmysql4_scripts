<?php
// This script retrieves all the records from the users table.

$page_title = 'View the Current Users';
include ('includes/header.php');

// Page header:
echo '<h1>Registered Users</h1>';

require('./mysqli_connect.php');    // Connect to the db.

// Make the query:
$q = "SELECT last_name, first_name, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr, user_id FROM users ORDER BY registration_date ASC";
$r = @mysqli_query($dbc, $q);   // Run the query.

// Count the number of returned rows:
$num = mysqli_num_rows($r);

if($num > 0) {    // If it ran OK, display the records.

    // Print how many users there are:
    echo "<p>There are currently $num registered users.</p>\n";

    // Table header.
    echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
    <tr>
        <td align="left"><b>Edit</b></td>
        <td align="left"><b>Delete</b></td>
        <td align="left"><b>Last Name</b></td>
        <td align="left"><b>First Name</b></td>
        <td align="left"><b>Date Registered</b></td>
    </tr>';

    // Fetch and print all the records:
    while($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        echo '<tr>
            <td align="left"><a href="edit_user.php?id=' . $row['user_id'] . '">Edit</a></td>
            <td align="left"><a href="delete_user.php?id=' . $row['user_id'] . '">Delete</a></td>
            <td align="left">' . $row['last_name'] . '</td>
            <td align="left">' . $row['first_name'] . '</td>
            <td align="left">' . $row['dr'] . '</td>
        </tr>';
    }

    echo '</table>';    // Close the table.

    mysqli_free_result($r); // Free up the resources.

}
else {  // If it did not run OK.

    echo '<p class="error">There are currently no registered users.</p>';

}   // End of if(r) IF.

mysqli_close($dbc);     // Close the database connection.

include('includes/footer.php');

?>