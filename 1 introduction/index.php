<?php

declare(strict_types=1);
$isComplete = true;
echo $isComplete;

$Booliens = [(int)true, (float)false, (int)true, (bool)1, 2.233];

var_dump($Booliens);


$firstName = "Abdullah";
$LastName = "{$firstName} Al Noman";

echo $LastName;

echo "</br>";
echo "--------";
echo "</br>";
$text1  = <<<TEXT
Line 1 
Line 2 
Line 3
TEXT;

echo nl2br($text1);

echo "</br>";
echo "--------";
echo "</br>";

$x = 1234;
$str =  (array)$x;

var_dump($str);