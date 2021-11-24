

<?php
//****************************
//	Задание 4
//****************************
//задания 2,3,5 - ниже

	$pageTitle="Курс PHP-start: Урок 1";
	$pageHeader=$pageTitle.". Домашнее задание";
	$year=date('Y');
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?=$pageTitle?> </title>
</head>
<body>
	<h1><?=$pageHeader?></h1>
	<p>Текущий год: <b><?=$year?></b></p>
<!--Конец задания 4-->
<!--************************-->

<?php
//****************************
//	Задание 2
//****************************

$hello="Hello world";
echo $hello."<br>";

define("HELLO","Hello constant");
echo HELLO."<br>";

$a=1;
$b=2;
echo "a + b = ".($a+$b);

$c=0;
echo "<br>преобразование 0: ".(boolean)$c;
echo "<br>преобразование 2: ".(boolean)$a;

echo "<br>".$a++." ".++$b."<br>";
echo $a<=$b."  ".$a==$b

?>

<?php
//***********************
//Задание 3
//*********************
$a = 5;
$b = '05';
echo "<br><br>";
var_dump($a == $b);// Почему true? - Происходит неявное преобразование строки '05' в число 5
echo "<br>";
var_dump((int)'012345'); // Почему 12345? - Происходит явное преобразование строки '12345' в число 12345
echo "<br>";
var_dump((float)123.0 === (int)123.0); //Строгое сравнение - сравниваются также результитующие типы, которые не равны
echo "<br>";
var_dump((int)0 === (int)'hello, world'); // Почему true? - (int)'hello, world' явно преобразовываетв в целый тип - получается 0
echo "<br>";
?>

<?php
//**********************
//Задание 5
//***************
 	$a=1;
	$b=2;
	echo "<br>До a=$a b=$b";
	$a=$a+$b-$b=$a;
	echo "<br>После a=$a b=$b";

?>



</body>
</html>

