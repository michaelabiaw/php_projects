
<!DOCTYPE html>
<html>
<head>
    <title>Grading System</title>
</head>
<body>

<h2>Student Grading System</h2>

<form action="assignment1.php" method="post">
    Score 1: <input type="number" name="score1" required><br><br>
    Score 2: <input type="number" name="score2" required><br><br>
    Score 3: <input type="number" name="score3" required><br><br>
    
    <input type="submit" value="Calculate">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Get user input
        $score1 = $_POST['score1'];
        $score2 = $_POST['score2'];
        $score3 = $_POST['score3'];

        // Validate input
        if (!is_numeric($score1) || !is_numeric($score2) || !is_numeric($score3)) {
            throw new Exception("Please enter valid numeric scores.");
        }

        if ($score1 < 0 || $score2 < 0 || $score3 < 0) {
            throw new Exception("Scores cannot be negative.");
        }

        // Calculate average
        $average_score = ($score1 + $score2 + $score3) / 3;
        $average_score = round($average_score, 2);
        echo "Average Score: " . $average_score . "<br>";

        // Calculate percentage
        $percentage = (($score1 + $score2 + $score3) / 300) * 100;
        $percentage = round($percentage, 2);
        echo "Percentage:  {$percentage} % <br>";

        // Example subject marks
        $subjects = [$score1, $score2, $score3, 45, 40];

        $failCount = 0;

        // For loop for failure check
        for ($i = 0; $i < count($subjects); $i++) {
            if ($subjects[$i] < 50) {
                $failCount++;
            }
        }

        // Display probation message
        if ($failCount > 2) {
            echo "Student is placed on academic probation.<br>";
        } else {
            echo "Student is in good standing.<br>";
        }

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
    }
}
?>

</body>
</html>