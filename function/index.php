<?php
$anonymousFunction = function () {
    return 12 + 13;
};
$x = 100;

$anotherAnonymousFunction = function ($z) use ($x) {
    return $z * $x;
};
echo $anotherAnonymousFunction(5);
echo "</br> --------->";
$arrowFunction = fn($peram) => $peram + 40;


$funcName = 'myFunction';
function myFunction() {
    return "Called via variable!";
};
echo $funcName();

