<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Widget Cost Calculator</title>
</head>
<body>
<?php
// This script calculates an order total based upon three form values.

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Sanitize the variables:
    $quantity = (isset($_POST['quantity'])) ? filter_var($_POST['quantity'], FILTER_VALIDATE_INT, array('min_range' => 1)) : NULL;
    $price = (isset($_POST['price'])) ? filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) : NULL;
    $tax = (isset($_POST['tax'])) ? filter_var($_POST['tax'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION) : NULL;

    // All the variables should be positive!
    if ( ($quantity > 0) && ($price > 0) && ($tax > 0) ) {
        
        // Calculate the total:
        $total = $quantity * $price;
        $total += $total * ($tax/100);

        // Print the result:
        echo '<p>The total cost of purchasing ' . $quantity . ' widget(s) at $' . number_format($price, 2) . ' each, plus tax, is $' . number_format($total, 2) . '.</p>';

    }
    else {
        echo '<p style="font-weight: bold; color: #C00">Please enter a valid quantity, price, and tax rate.</p>';
    }

}   // End of main isset() IF.

// Leave the PHP section and create the HTML form.
?>
<h2>Widget Cost Calculator</h2>
<form action="calculator.php" method="post">
    <p>Quantity: <input type="text" name="quantity" size="5" maxlength="10" value="<?php if(isset($quantity)) echo $quantity; ?>" ></p>
    <p>Price: <input type="text" name="price" size="5" maxlength="10" value="<?php if(isset($price)) echo $price; ?>" ></p>
    <p>Tax (%): <input type="text" name="tax" size="5" maxlength="10" value="<?php if(isset($tax)) echo $tax; ?>" ></p>
    <p><input type="submit" name="submit" value="Calculate!"></p>
</form>
</body>
</html>