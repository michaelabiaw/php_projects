
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

// Get user input

try {

    $score1 = 88;
    $score2 = 76;
    $score3 = 94;

    // Validate inputs
    if (!is_numeric($score1) || !is_numeric($score2) || !is_numeric($score3)) {
        throw new Exception("Invalid input: Scores must be numeric.");
    }

    // Average calculation
    $average = ($score1 + $score2 + $score3) / 3;
    $average = round($average,2);
    echo "Average Score: {$average}<br>";

    // Percentage
    $total = $score1 + $score2 + $score3;
    $percentage = ($total / 300) * 100;
    $percentage = round($percentage, 2);
    echo "Percentage: {$percentage} % <br>";

    // Five subjects
    $subjects = [88, 45, 60, 30, 72];
    $failCount = 0;

    foreach ($subjects as $mark) {
        if (!is_numeric($mark)) {
            throw new Exception("Invalid subject mark detected.");
        }
        if ($mark < 50) {
            $failCount++;
        }
    }

    echo "Failed Subjects: " . $failCount . "<br>";

    if ($failCount > 2) {
        echo "Student is placed on academic probation.<br>";
    }

    // Pass/Fail logic
    if ($average >= 50) {
        echo "Status: Pass<br>";
    } else {
        echo "Status: Fail<br>";
    }

    // Honor roll check
    if ($average > 90 && ($score1 > 95 || $score2 > 95 || $score3 > 95)) {
        echo "Honor Roll Eligible <br>";
    }

} catch (Exception $e) {
    echo "Error:" . $e->getMessage() . "<br>";
}

//loops for 5 students
echo "Grade Processing for 5 Students: ";

$students = [
    [78, 85, 90],
    [45, 50, 40],
    [92, 95, 98],
    [60, 70, 65],
    [30, 40, 35]
];

for ($i = 0; $i < 5; $i++) {

    echo "Student " . ($i + 1) . "<br>";

    try {

        $s1 = $students[$i][0];
        $s2 = $students[$i][1];
        $s3 = $students[$i][2];

        // Validate
        if (!is_numeric($s1) || !is_numeric($s2) || !is_numeric($s3)) {
            throw new Exception("Invalid score detected for Student " . ($i + 1));
        }

        $avg = ($s1 + $s2 + $s3) / 3;

        echo "Average: " . round($avg, 2) . "<br>";

        if ($avg >= 50) {
            echo "Result: Pass<br>";
        } else {
            echo "Result: Fail<br>";
        }

        if ($avg > 90 && ($s1 > 95 || $s2 > 95 || $s3 > 95)) {
            echo "Honor Roll Eligible<br>";
        }

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "<br>";
    }
}
?>

</body>
</html>








