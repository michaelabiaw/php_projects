<?php

// intialize error variables
$firstname_error = null;
$email_error = null;
$profile_description_error = null;
$fav_color_error = null;
$gender_error = null;
$fav_food_error = null;
$database_error = null;
$success_message = null;

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_data = $_POST;
    highlight_string("<?php " . var_export($user_data, true) . "?>");

}