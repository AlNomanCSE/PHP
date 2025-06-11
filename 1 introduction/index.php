<?php
$title = "My Website";
// =============================================================================
// 1. ARRAY TYPE
// =============================================================================
$fruits = ["apple", "banana", "orange"];
// var_dump($fruits);
print_r($fruits);
echo  "</br>";
foreach($fruits as $fruit){
   echo $fruit . "</br>";
}
foreach ($fruits as $index => $fruit) {
    echo "Index $index: $fruit </br>";
}

?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <h1 class="text-3xl font-bold text-blue-600">
        <?= $headLine . $title ?>
    </h1>
    <p class="text-gray-700 mt-4">
        <?= 'Learn PHP' ?>
    </p>
</body>

</html> -->