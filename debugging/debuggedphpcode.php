<?php

// Function to print grade based on marks
function printGrade($marks) {
    // Validate input: must be numeric and between 0-100
    if (!is_numeric($marks) || $marks < 0 || $marks > 100) {
        echo "Grade: Invalid Marks\n";
        return;
    }

    // Check and print grade based on range
    if ($marks >= 90 && $marks <= 100) {
        echo "Grade: A\n";
    } elseif ($marks >= 80 && $marks < 90) {
        echo "Grade: B\n";
    } elseif ($marks >= 70 && $marks < 80) {
        echo "Grade: C\n";
    } elseif ($marks >= 60 && $marks < 70) {
        echo "Grade: D\n";
    } else {
        echo "Grade: F\n";
    }
}

// Array of students with their names and scores
$students = [
    ["name" => "Alice", "score" => 92],     // Valid score
    ["name" => "Bob", "score" => 85],       // Valid score
    ["name" => "Charlie", "score" => 55],   // Valid score
    ["name" => "David", "score" => 103],    // Invalid: too high
    ["name" => "Eve", "score" => null],     // Invalid: null
    ["name" => "Frank"]                     // Invalid: score key missing
];

// Loop through each student
foreach ($students as $student) {
    echo "Student: " . $student["name"] . "\n";

    // Check if 'score' key exists in the array
    if (array_key_exists("score", $student)) {
        printGrade($student["score"]);
    } else {
        echo "Grade: Score Not Provided\n";
    }

    echo "------------------\n";
}
