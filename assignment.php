
<?php
// Store three exam scores
$score1 = 85;
$score2 = 80;
$score3 = 92;

// Calculate average score
$average_score = ($score1 + $score2 + $score3) / 3;
$average_score = round($average_score, 2);
echo "Your average score is: " . $average_score."<br>";


// Calculate percentage out of 300 total marks
$percentage = (($score1 + $score2 + $score3) / 300) * 100;
$percentage = round($percentage, 2);
echo "Percentage: " . $percentage . "%". "<br>";

// Array storing marks for five subjects
$subjects = [45, 67, 32, 88, 40];

// Initialize fail counter
$failCount = 0;

// Use for loop to iterate through the array by index
for ($i = 0; $i < 5; $i++) {

    // Check each subject mark
    if ($subjects[$i] < 50) {
        $failCount++; // Increment if student failed the subject
    }
}

// Display warning if student failed more than two subjects
if ($failCount > 2) {
    echo "Student is placed on academic probation.";

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




?>