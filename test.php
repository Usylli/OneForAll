<?php 

function calculateDiscount($carpetLenght, $carpetWidth){
    return $carpetLenght * $carpetWidth;
}

$carpetLenght = 5;
$carpetWidth = 10;
$carpetSize = calculateDiscount($carpetLenght, $carpetWidth);

echo $carpetSize;
?>