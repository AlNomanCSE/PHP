<?php

$newArray = ['php', 'c++', 'java'];
$newArray[] = 'Go';
array_push($newArray, 'Python');
array_unshift($newArray, '1');
array_unshift($newArray, '2', '3', '4');
$newMargedarray = array_merge($newArray, ['x', 'y', "Z"]);

echo '<pre>';
print_r($newMargedarray);
echo '</pre>';
echo '<pre>';
print_r($newArray);
echo '</pre>';



$user = [
    [
        "id" => 1,
        "name" => "John Doe",
        "email" => "john@example.com"
    ],
    [
        "id" => 2,
        "name" => "Jane Smith",
        "email" =>  [
            "name" => "John Doe",
            "email" => "john@example.com",
            "age" => 30,
            "city" => "New York"
        ]
    ]
];

$user["country"] = "Bangladesh";

// echo '<pre>';
// print_r($user);
// echo '</pre>';

$array = ['a','b','c'];
unset($array[0],$array[1],$array[2]);
$array[] ='2';
var_dump($array);
echo '<pre>';
print_r($array);
echo '</pre>';

