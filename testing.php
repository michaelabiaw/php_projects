<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grading System</title>
</head>
<body>

<h2>Student Grading System</h2>

<form method="post">
    <label>Score 1:</label>
    <input type="text" name="score1"><br><br>

    <label>Score 2:</label>
    <input type="text" name="score2"><br><br>

    <label>Score 3:</label>
    <input type="text" name="score3"><br><br>

    <input type="submit" value="Calculate">
</form>

<hr>

<?php

// a. Three exam scores
$score1 = 88;
$score2 = 76;
$score3 = 94;

// Calculate average
$average = ($score1 + $score2 + $score3) / 3;
echo "Average Score: " . round($average, 2) . "<br>";

// b. Percentage out of 300
$total = $score1 + $score2 + $score3;
$percentage = ($total / 300) * 100;
echo "Percentage: " . round($percentage, 2) . "%<br>";

// c. Five subjects fail check
$subjects = [88, 45, 60, 30, 72];
$failCount = 0;

foreach ($subjects as $mark) {
    if ($mark < 50) {
        $failCount++;
    }
}

echo "Failed Subjects: " . $failCount . "<br>";

if ($failCount > 2) {
    echo "Student is placed on academic probation.<br>";
}



// a. Pass or Fail
if ($average >= 50) {
    echo "<b>Status: Pass</b><br>";
} else {
    echo "<b>Status: Fail</b><br>";
}

// b. Honor Roll condition
if ($average > 90 && ($score1 > 95 || $score2 > 95 || $score3 > 95)) {
    echo "Congratulations! Student qualifies for Honor Roll.<br>";
}



//echo "<h3>Batch Processing (5 Students)</h3>";

// Example fixed data (since browser PHP cannot use interactive input easily)
$students = [
    [78, 85, 90],
    [45, 50, 40],
    [92, 95, 98],
    [60, 70, 65],
    [30, 40, 35]
];

for ($i = 0; $i < 5; $i++) {

    $s1 = $students[$i][0];
    $s2 = $students[$i][1];
    $s3 = $students[$i][2];

    $avg = ($s1 + $s2 + $s3) / 3;

    echo "Student " . ($i + 1) . "<br>";
    echo "Average: " . round($avg, 2) . "<br>";

    if ($avg >= 50) {
        echo "Result: Pass<br>";
    } else {
        echo "Result: Fail<br>";
    }

    if ($avg > 90 && ($s1 > 95 || $s2 > 95 || $s3 > 95)) {
        echo "Honor Roll Eligible<br>";
    }
}

?>
</body>
</html>