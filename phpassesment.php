<?php

// question no 1 string reversal 

function reverseString($str) {
    $reversed = '';
    for ($i = strlen($str) - 1; $i >= 0; $i--) {
        $reversed .= $str[$i];
    }
    return $reversed;
}
echo "1. Reversed String of 'hello': " . reverseString("hello") . "\n\n";

// qn no 2 filter even number from array

function filterEvenNumbers($arr) {
    $evenNumbers = [];
    foreach ($arr as $num) {
        if ($num % 2 === 0) {
            $evenNumbers[] = $num;
        }
    }
    return $evenNumbers;
}
$inputArray = [1, 2, 3, 4, 5];
echo "2. Even Numbers: ";
print_r(filterEvenNumbers($inputArray));
echo "\n";

// qn no 3 == vs === in php

echo "3. == vs === Explanation:\n";
$val1 = "5";  // here the type is string
$val2 = 5;    // here the type is integer

echo "'5' == 5: ";
var_dump($val1 == $val2); // it only checks for value, it don't check the type so it will return true

echo "'5' === 5: ";
var_dump($val1 === $val2); // it will check both value and type but here only value are same but type is different so it will return false
echo "\n";

// qn no 4 recursive factorial function
function factorial($n) {
    if ($n <= 1) return 1;
    return $n * factorial($n - 1);
}
echo "4. Factorial of 5: " . factorial(5) . "\n\n";

// qn 5. Find Highest Score in Array
function getHighestScore($scores) {
    $highest = $scores[0];
    foreach ($scores as $score) {
        if ($score > $highest) {
            $highest = $score;
        }
    }
    return $highest;
}
$scores = [45, 78, 89, 99, 66];
echo "5. Highest Score: " . getHighestScore($scores) . "\n";

?>
