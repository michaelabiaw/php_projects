<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>radius</title>
</head>
<body>
    <form action="radius.php" method="post"><br>
        <label>radius:</label>
        <input type ="text" name="radius">
        <input type="submit" value="calculate">
    </form>
    
</body>
</html>
<?php
$radius = $_POST["radius"];
$circumference = null;
$area = null;
$volume = null;

// Calculate the circumference of the circle
$circumference = 2 * pi() * $radius;
$cirumference = round($circumference, 2);

// Calculate the area of the circle
$area = pi() *pow($radius, 2);
$area = round($area, 2);

// Calculate the volume of the sphere
$volume = (4/3) * pi() * pow($radius, 3);
$volume = round($volume, 2);


echo "The circumference of a circle with a radius of {$radius} is {$circumference} <br>";
echo "Area of a circle with a radius of {$radius} is {$area} <br>";
echo "Volume of a sphere with a radius of {$radius} is  {$volume}";