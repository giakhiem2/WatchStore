<?php
// Check if the product ID is provided
if (isset($_GET['product'])) {
    $product_id = $_GET['product'];

    // Implement the logic to remove the product from the cart
    // Update the database or session variables accordingly

    // For example, if you are using sessions, you can remove the product from the session cart like this:
    session_start();
    if (isset($_SESSION['SESSION_EMAIL'])) {
        $email = $_SESSION['SESSION_EMAIL'];
        $query = executeSingleResult("SELECT * FROM users WHERE email='$email'");
        $id = $query['id'];

        execute("DELETE FROM cart WHERE userid = $id AND productid = $product_id");

        // You can also update the database table to remove the product if needed
        // execute("DELETE FROM cart WHERE userid = $id AND productid = $product_id");
    }
}
?>


