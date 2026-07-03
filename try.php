<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
// a. Average of 3 exam scores
$score1 = 78;
$score2 = 85;
$score3 = 92;

$average = ($score1 + $score2 + $score3) / 3;
echo "Average Score: " . $average . "<br>";

// b. Percentage out of 300
$total = $score1 + $score2 + $score3;
$percentage = ($total / 300) * 100;
echo "Percentage: " . $percentage . "%<br>";


// c. Five subjects fail check
$subjects = [65, 40, 55, 30, 80];
$failCount = 0;

foreach ($subjects as $mark) {
    if ($mark < 50) {
        $failCount++;
    }
}

if ($failCount > 2) {
    echo "Student is placed on academic probation.<br>";
}

// a & b. Pass/Fail and Honor Roll check
if ($average >= 50) {
    echo "Pass<br>";
} else {
    echo "Fail<br>";
}

if ($average > 90 && ($score1 > 95 || $score2 > 95 || $score3 > 95)) {
    echo "Eligible for Honor Roll<br>";
}

// c. Loop for 5 students

for ($i = 1; $i <= 5; $i++) {
    echo "<br>Student $i Results:<br>";

    $s1 = readline("Enter score 1: ");
    $s2 = readline("Enter score 2: ");
    $s3 = readline("Enter score 3: ");

    $avg = ($s1 + $s2 + $s3) / 3;

    if ($avg >= 50) {
        echo "Result: Pass<br>";
    } else {
        echo "Result: Fail<br>";
    }
}


?>
</body>
</html>