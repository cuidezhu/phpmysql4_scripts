<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sorting Arrays</title>
</head>
<body>
<table border="0" cellspacing="3" cellpadding="3" align="center">
    <tr>
        <td><h2>Rating</h2></td>
        <td><h2>Title</h2></td>
    </tr>
    <?php

    // Create the array:
    $movies = array(
        'Casablanca' => 10,
        'To Kill a Mockingbird' => 10,
        'The Englis Patient' => 2,
        'Stranger Than Fiction' => 9,
        'Story of the Weeping Camel' => 5,
        'Donnie Darko' => 7
    );

    // Display the movie in their original order:
    echo '<tr><td colspan="2"><b>In their original order:</b></td></tr>';
    foreach ($movies as $title => $rating) {
        echo "<tr><td>$rating</td>
        <td>$title</td></tr>\n";
    }

    // Display the movies sorted by title:
    ksort($movies);
    echo '<tr><td colspan="2"><b>Sorting by title:</b></td>';
    foreach ($movies as $title => $rating) {
        echo "<tr><td>$rating</td>
        <td>$title</td></tr>\n";
    }

    // Display the movies sorted by rating:
    arsort($movies);
    echo '<tr><td colspan="2"><b>Sorted by rating:</b></td></tr>';
    foreach($movies as $title => $rating) {
        echo "<tr><td>$rating</td>
        <td>$title</td></tr>\n";
    }

    ?>
</table>
</body>
</html>