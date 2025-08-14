<?php 
require_once "animal.php";
require_once "Ape.php"; 
require "Frog.php";


$sheep = new Animal("shaun");

echo "Name: ".$sheep->name. "<br>"; // "shaun"
echo "legs: ".$sheep->legs ."<br>"; // 4 
echo "cold_blooded: ".$sheep->cold_blooded . "<br> <br> "; // "no"



// NB: Boleh juga menggunakan method get (get_name(), get_legs(), get_cold_blooded())
// index.php
$sungokong = new Ape("kera sakti");
// echo $sungokong->yell(); // "Auooo"
// echo $sungokong->legs;
echo "Name: ".$sungokong->name. "<br>"; 
echo "legs: ".$sungokong->legs ."<br>"; 
echo "cold_blooded: ".$sungokong->cold_blooded . "<br> <br> "; 

$kodok = new Frog("buduk");
// echo $kodok->jump() ; // "hop hop"
echo "Name: ".$kodok->name. "<br>"; 
echo "legs: ".$kodok->legs ."<br>"; 
echo "cold_blooded: ".$kodok->cold_blooded . "<br> <br> "; 
?>