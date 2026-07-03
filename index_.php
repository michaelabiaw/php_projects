<?php require "form_val.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Form handling in php</h2>
    <form name ="profile-form "action="" method="post" encrypt="">
        <!----first name input field--->
        <label for="firstname">Enter your first name</label>
        <input id="firstname" type="text" name="firstname" value="">
        <br>
    
        <!---email input field--->
        <label for="email">Enter your email </label>
        <input name="email" type="email" id="email" value="">
        <br>

        <!-- textarea -->
        <h4>write a few words about food</h4>
        <label for="about food"></label>
        <textarea name="write a few words about food " id="summary" rows="8" cols="30"></textarea>
        <br>

        <!---dropdown select---->
        <label for="fav-color"></label>
        <select id="fav-color" name="fav-color">
            <option value="">select a color</option>
            <option value="red">Red</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
            <option value="black">Black</option>
        </select>
        <br>
        
        <!--radio buttons -->
        <div class="radio-buttons">
            <h3>Select your gender</h3>
            <label for="male">Male</label>
            <input id="male" type="radio" name="gender" value="male">

            <label for="female">Female</label>
            <input type="radio" id="female" name="gender" value="female">
        </div>

        <!-- check boxes -->
        <div class="checkboxes">
            <h3>Select the food you like</h3>
            <label for="pizza">Pizza</label>
            <input type="checkbox" id="pizza" name="fav_food[]" value="pizza">

            <label for="spaghetti">Spaghetti</label>
            <input type="checkbox" id="spaghetti" name="fav_food[]" value="spaghetti">

            <label for="broccoli">Broccoli</label>
            <input type="checkbox" id="broccoli" name="fav_food[]" value="broccoli">
        </div>

        <!-- submit button -->
        <button type="text" name="submit">Submit</button>

    </form>
</body>
</html>