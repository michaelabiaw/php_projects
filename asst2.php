
<?php

// PART 3: PHP PROCESSING LOGIC

// Store messages
$errors = [];
$successMessage = "";
$getMessage = "";

// -------------------------------
// INPUT SANITIZATION FUNCTION
// -------------------------------
function clean_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// HANDLE GET REQUEST (GET METHOD)

if (isset($_GET['name'])) {
    $name = clean_input($_GET['name']);
    $getMessage = "Welcome " . $name . "!";
}

// HANDLE POST REQUEST (REGISTRATION)

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Capture and sanitize input
    $username = clean_input($_POST['username']);
    $email = clean_input($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // 1. Check empty fields
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $errors[] = "All fields are required.";
    }

    // 2. Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // 3. Password strength validation
    if (!preg_match("/^(?=.*[0-9])(?=.*[\W]).{8,}$/", $password)) {
        $errors[] = "Password must be at least 8 characters, include a number and a special character.";
    }

    // 4. Confirm password match
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // 5. If valid, process securely
    if (empty($errors)) {

        // Hash password for security
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $successMessage = "Registration successful! congratulations, " . $username . "! (Password securely hashed)";

        // NOTE: In real applications, use prepared statements to store in database
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure Registration & GET/POST Demo</title>
</head>
<body>


<!-- PART 1: USER REGISTRATION FORM -->

<h2>User Registration</h2>

<form method="POST" action="">

    <label>Username:</label>
    <input type="text" name="username" required><br><br>

    <label>Email:</label>
    <input type="text" name="email" required><br><br>

    <label>Password:</label>
    <input type="password" name="password" required><br><br>

    <label>Confirm Password:</label>
    <input type="password" name="confirm_password" required><br><br>

    <input type="submit" value="Register">

</form>

<hr>


<!-- PART 2: GET METHOD DEMONSTRATION -->

<h2>GET Method</h2>

<form method="GET" action="">
    <label>Enter Name:</label>
    <input type="text" name="name">
    <input type="submit" value="Send">
</form>

<hr>


<!-- PART 4: OUTPUT DISPLAY -->


<?php
// Display GET message
if (!empty($getMessage)) {
    echo "$getMessage <br>";
}

// Display errors
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "$error<br>";
    }
}

// Display success message
if (!empty($successMessage)) {
    echo "$successMessage <br>";
}
?>

</body>
</html>