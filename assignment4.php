
<?php
// Initialize variables
$errors = [];
$successMessage = "";
$getMessage = "";

// Function to sanitize input (prevents XSS attacks)
function clean_input($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// ----------------------
// HANDLE GET REQUEST
// ----------------------
if (isset($_GET['name'])) {
    // Sanitize GET input before displaying
    $name = clean_input($_GET['name']);
    $getMessage = "Welcome, " . $name . " (received via GET)";
}

// ----------------------
// HANDLE POST REQUEST (Registration)
// ----------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Capture and sanitize input
    $username = clean_input($_POST['username']);
    $email = clean_input($_POST['email']);
    $password = $_POST['password']; // do NOT sanitize passwords before hashing
    $confirm_password = $_POST['confirm_password'];

    // Validate empty fields
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $errors[] = "All fields are required.";
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    // Validate password strength
    if (!preg_match("/^(?=.*[0-9])(?=.*[\W]).{8,}$/", $password)) {
        $errors[] = "Password must be at least 8 characters and include a number and special character.";
    }

    // Check password match
    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    // If no errors, process securely
    if (empty($errors)) {
        // Hash password securely before storage
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // NOTE: In a real system, insert into database using prepared statements
        $successMessage = "Registration successful! (Password securely hashed)";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Secure Registration & GET/POST Demo</title>
</head>
<body>

<h2>GET Method Example</h2>

<!-- GET Form -->
<form method="GET" action="">
    <label>Enter your name:</label>
    <input type="text" name="name">
    <input type="submit" value="Send via GET">
</form>

<!-- Display GET result -->
<?php
if (!empty($getMessage)) {
    echo "<p style='color:blue;'>$getMessage</p>";
}
?>

<hr>

<h2>User Registration (POST Method)</h2>

<!-- Display validation errors -->
<?php
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
}

// Display success message
if (!empty($successMessage)) {
    echo "<p style='color:green;'>$successMessage</p>";
}
?>

<!-- Registration Form -->
<form method="POST" action="">
    
    <!-- Username -->
    <label>Username:</label>
    <input type="text" name="username"><br><br>

    <!-- Email -->
    <label>Email:</label>
    <input type="text" name="email"><br><br>

    <!-- Password -->
    <label>Password:</label>
    <input type="password" name="password"><br><br>

    <!-- Confirm Password -->
    <label>Confirm Password:</label>
    <input type="password" name="confirm_password"><br><br>

    <input type="submit" value="Register">

</form>

<hr>

<h2>Explanation (GET vs POST)</h2>

<p><strong>GET:</strong> Sends data through the URL. Best for non-sensitive data like search queries.</p>
<p><strong>POST:</strong> Sends data in the request body. More secure and used for sensitive data like passwords.</p>

</body>
</html>