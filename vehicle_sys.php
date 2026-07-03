<?php

// Object-Oriented Programming in PHP
// This class stores common properties and methods
// shared by all vehicles.
class Vehicle {

    // Common properties for all vehicles
    protected $brand;
    protected $model;
    protected $year;
    protected $price;

    // Static property to count total vehicles created
    public static $vehicleCount = 0;


    // Constructor
    // Initializes vehicle properties when an object
    // is created.
    public function __construct($brand, $model, $year, $price) {

        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->price = $price;

        // Increase count whenever a new vehicle is made
        self::$vehicleCount++;
    }


    // displayInfo()
    // Displays general vehicle information.
    
    public function displayInfo() {

        return "Brand: " . $this->brand .
            " | Model: " . $this->model .
            " | Year: " . $this->year .
            " | Price: $" . $this->price;
    }


    // getVehicleCount()
    // Returns total number of vehicle objects created.
    
    public static function getVehicleCount() {

        return self::$vehicleCount;
    }

    // compareByPrice()
    // Compares the price of two vehicles.
    public function compareByPrice($otherVehicle) {

        if ($this->price > $otherVehicle->price) {

            return "This vehicle is more expensive.";

        } elseif ($this->price < $otherVehicle->price) {

            return "The other vehicle is more expensive.";

        } else {

            return "Both vehicles have the same price.";
        }
    }
}

// SUBCLASS: Car
// Inherits properties and methods from Vehicle.
class Car extends Vehicle {

    // Unique property for Car
    private $numberOfDoors;


    // Constructor for Car class
    public function __construct(
        $brand,
        $model,
        $year,
        $price,
        $numberOfDoors
    ) {

        // Call parent constructor
        parent::__construct($brand, $model, $year, $price);

        // Initialize car-specific property
        $this->numberOfDoors = $numberOfDoors;
    }


    
    // Overridden displayInfo()
    // Displays common and car-specific details.

    public function displayInfo() {

        return parent::displayInfo() .
            " | Number of Doors: " .
            $this->numberOfDoors;
    }
}


// cubclass: Truck
// Inherits from Vehicle class.
class Truck extends Vehicle {

    // Unique property for Truck
    private $cargoCapacity;


    // Constructor for Truck class
    public function __construct(
        $brand,
        $model,
        $year,
        $price,
        $cargoCapacity
    ) {

        // Call parent constructor
        parent::__construct($brand, $model, $year, $price);

        // Initialize truck-specific property
        $this->cargoCapacity = $cargoCapacity;
    }


    // Overridden displayInfo() method
    public function displayInfo() {

        return parent::displayInfo() .
            " | Cargo Capacity: " .
            $this->cargoCapacity . " tons";
    }
}


// subclass: Motorcycle
// Inherits from Vehicle class.

class Motorcycle extends Vehicle {

    // Unique property for Motorcycle
    private $handlebarType;


    // Constructor for Motorcycle class
    public function __construct(
        $brand,
        $model,
        $year,
        $price,
        $handlebarType
    ) {

        // Call parent constructor
        parent::__construct($brand, $model, $year, $price);

        // Initialize motorcycle-specific property
        $this->handlebarType = $handlebarType;
    }


    // Overridden displayInfo() method
    public function displayInfo() {

        return parent::displayInfo() .
            " | Handlebar Type: " .
            $this->handlebarType;
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Vehicle collection System</title>

</head>

<body>

<h2>Vehicle collection System</h2>


<!-- ==================================================
HTML FORM
Allows user to enter vehicle details.
================================================== -->

<form method="POST">

    <!-- Brand input -->
    Brand:
    <input type="text" name="brand" required>
    <br><br>


    <!-- Model input -->
    Model:
    <input type="text" name="model" required>
    <br><br>


    <!-- Year input -->
    Year:
    <input type="number" name="year" required>
    <br><br>


    <!-- Price input -->
    Price:
    <input type="number" name="price" required>
    <br><br>


    <!-- Vehicle type selection -->
    Vehicle Type:

    <select name="type">

        <option value="car">Car</option>

        <option value="truck">Truck</option>

        <option value="motorcycle">Motorcycle</option>

    </select>

    <br><br>


    <!-- Unique attribute input -->
    Unique Attribute:
    <br>
    (Car = Number of Doors,
    Truck = Cargo Capacity,
    Motorcycle = Handlebar Type)
    <br>

    <input type="text" name="unique" required>

    <br><br>


    <!-- Submit button -->
    <button type="submit">Create Vehicle</button>

</form>

<hr>



<?php
// sample objects
// Demonstrates inheritance and method overriding.

// Create sample Car object
$sampleCar = new Car(
    "Toyota",
    "Camry",
    2022,
    25000,
    4
);

// Create sample Truck object
$sampleTruck = new Truck(
    "Ford",
    "F-150",
    2023,
    40000,
    5
);

// Create sample Motorcycle object
$sampleBike = new Motorcycle(
    "Yamaha",
    "R1",
    2021,
    18000,
    "Clip-On"
);


// Display sample objects
echo "<h3>Sample Vehicles</h3>";

echo $sampleCar->displayInfo();
echo "<br><br>";

echo $sampleTruck->displayInfo();
echo "<br><br>";

echo $sampleBike->displayInfo();
echo "<br><br>";


// Compare prices between two vehicles
echo "<strong>Price Comparison:</strong><br>";

echo $sampleCar->compareByPrice($sampleTruck);

echo "<hr>";


// Runs when the user submits the form.

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Store user input into variables
    $brand = $_POST["brand"];
    $model = $_POST["model"];
    $year = $_POST["year"];
    $price = $_POST["price"];
    $type = $_POST["type"];
    $unique = $_POST["unique"];


    echo "<h3>New Vehicle Created</h3>";


    
    // Create object depending on selected type
    if ($type == "car") {

        // Create Car object
        $vehicle = new Car(
            $brand,
            $model,
            $year,
            $price,
            $unique
        );

    } elseif ($type == "truck") {

        // Create Truck object
        $vehicle = new Truck(
            $brand,
            $model,
            $year,
            $price,
            $unique
        );

    } else {

        // Create Motorcycle object
        $vehicle = new Motorcycle(
            $brand,
            $model,
            $year,
            $price,
            $unique
        );
    }

    // Display newly created vehicle information
    echo $vehicle->displayInfo();

    echo "<br><br>";

    // Display total number of vehicles created
    echo "<strong>Total Vehicles Created:</strong> ";

    echo Vehicle::getVehicleCount();
}

?>

</body>
</html>