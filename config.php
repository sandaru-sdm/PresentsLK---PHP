<?php
    require_once "stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey" => "sk_test_51LUtaCLtfP1LafvhvuZF8xMBC7XoXIXUE8BfumMA3O8fbipMCad50ga0WxcgxIHGx6fYYiezulfus5AsLCUqTQqz00S6xksDUJ",
        "publishableKey" => "pk_test_51LUtaCLtfP1Lafvh8p1kssA6WnpXQ7ej4Stwz5cZvpojQp55xQQWjWToyXjR2671EYcXb4Uov6dDJaf341mjLHkt00R1Tiwte2"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>