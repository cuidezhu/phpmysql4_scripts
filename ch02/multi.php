<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Multidimensional Arrays</title>
</head>
<body>
<p>Some Nroth American States, Provinces, and Territories:</p>
<?php

// Create one array:
$mexico = array(
    'YU' => 'Yucatan',
    'BC' => 'Baja California',
    'OA' => 'Oaxaca'
);

// Create another array:
$us = array(
    'MD' => 'Maryland',
    'IL' => 'Illinois',
    'PA' => 'Pennsylvania',
    'IA' => 'Iowa'
);

// Create a third array:
$canada = array(
    'QC' => 'Quebec',
    'AB' => 'Alberta',
    'NT' => 'Northwest Territories',
    'YT' => 'Yukon',
    'PE' => 'Prince Edward Island'
);

// Combine the arrays:
$n_america = array(
    'Mexico' => $mexico,
    'United States' => $us,
    'Canada' => $canada
);

// Loop through the countries:
foreach ($n_america as $country => $list) {

    // Print a heading
    echo "<h2>$country</h2>\n<ul>";

    // Print each state, province, or territory:
    foreach ($list as $k => $v) {
        echo "<li>$k - $v</li>\n";
    }

    // Close the list:
    echo "</ul>\n";

}   // End of main FOREACH

?>
</body>
</html>