
<!DOCTYPE html>
<html>
<head>
    <title>Student Grading System</title>
</head>
<body>

<h2>Enter Scores for 5 Students</h2>

<form method="POST">

<?php
for ($i = 0; $i < 5; $i++) {
    echo "<h3>Student " . ($i + 1) . "</h3>";
    echo "Score 1: <input type='text' name='score1[]' required><br>";
    echo "Score 2: <input type='text' name='score2[]' required><br>";
    echo "Score 3: <input type='text' name='score3[]' required><br><br>";
}
?>

<input type="submit" value="Calculate Results">

</form>

<hr>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        $score1 = $_POST['score1'];
        $score2 = $_POST['score2'];
        $score3 = $_POST['score3'];

        echo "<h2>Results</h2>";

        for ($i = 0; $i < 5; $i++) {

            if (!is_numeric($score1[$i]) || !is_numeric($score2[$i]) || !is_numeric($score3[$i])) {
                throw new Exception("All scores must be numeric for Student " . ($i + 1));
            }

            $s1 = $score1[$i];
            $s2 = $score2[$i];
            $s3 = $score3[$i];

            if ($s1 < 0 || $s2 < 0 || $s3 < 0) {
                throw new Exception("Scores cannot be negative for Student " . ($i + 1));
            }

            // Average
            $average = ($s1 + $s2 + $s3) / 3;
            $average = round($average, 2);
            

            // Letter Grade
            if ($average >= 90) {
                $grade = "A";
            } elseif ($average >= 80) {
                $grade = "B";
            } elseif ($average >= 70) {
                $grade = "C";
            } else {
                $grade = "F";
            }

            echo "Student " . ($i + 1) . "<br>";
            echo "Average: " . $average . "<br>";
            echo "Grade: " . $grade . "<br>";

            // Pass / Fail
            if ($average >= 50) {
                echo "Result: Pass<br>";
            } else {
                echo "Result: Fail<br>";
            }

            // Honor Roll
            if ($average > 90 && ($s1 > 95 || $s2 > 95 || $s3 > 95)) {
                echo "Honor Roll Qualified<br>";
            }

            echo "<br>";
        }

    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

</body>
</html>