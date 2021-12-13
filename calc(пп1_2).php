<?php
$projectName = "PHP start GB";
$homeWorkNumber = "Домашняя работа №6";

$operations = ["+", "-", "*", "/", "%"];

//Calc ver1
$selectedOperation = htmlspecialchars(strip_tags($_POST['action']));
$val1 = (float)htmlspecialchars(strip_tags($_POST['val1']));
$val2 = (float)htmlspecialchars(strip_tags($_POST['val2']));
$result = ($selectedOperation) ? calculate($val1, $val2, $selectedOperation) : "";

//Calc ver2
$selectedOperationVer2 = htmlspecialchars(strip_tags($_POST['doActionV2']));
echo $selectedOperationVer2;
$val3 = (float)htmlspecialchars(strip_tags($_POST['val3']));
$val4 = (float)htmlspecialchars(strip_tags($_POST['val4']));
$resultVer2 = ($selectedOperationVer2) ? calculate($val3, $val4, $selectedOperationVer2) : "";


function calculate($val1, $val2, $operation)
{
    switch ($operation) {
        case "+":
            return $val1 + $val2;
        case "-":
            return $val1 - $val2;
        case "*":
            return $val1 * $val2;
        case "/":
            return ($val2 == 0) ? "ERR:Деление на 0" : ($val1 / $val2);
        case "%":
            return $val2 == 0 ? "ERR:Деление на 0" : (int)$val1 % (int)$val2;
        default:
            return "Неверная операция";
    }
}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $projectName . ": " . $homeWorkNumber ?></title>
    <style>
        .calc {
            max-width: 600px;
            margin: 0 auto;
        }

        .calc input, select, p {
            max-width: 80px;
            padding: 8px 15px;
            font-size: 20px;
            margin: 0 3px;
        }

        p {
            padding: 8px 0;
            max-width: 100%;
        }
    </style>
</head>
<body>

<form class="calc" action="#" method="post">
    <h2>Калькулятор</h2>
    <input type="number" step="any" name="val1" value=<?= $val1 ? $val1 : null ?>>
    <select name="action">
        <?php
        foreach ($operations as $item) {
            echo "<option value=$item " . (($item === $selectedOperation) ? "selected" : null) . ">$item</option>";
        } ?>
    </select>
    <input type="number" step="any" name="val2" value=<?= $val2 ? $val2 : null ?>>
    <input type="submit" name="doAction" value="=">
    <p>Результат: <?= $result ?>
    </p>
    <!--</form>-->
    <!--<form class="calc" action="#" method="post">-->
    <h2>Калькулятор 2</h2>
    <input type="number" step="any" name="val3" value=<?= $val3 ? $val3 : null ?>>
    <input type="number" step="any" name="val4" value=<?= $val4 ? $val4 : null ?>>
    <?php
    foreach ($operations as $item) {
        echo "<input type='submit' name='doActionV2' value=$item>";
    } ?>
    <p>Результат: <?= $resultVer2 ?>
    </p>
</form>

</body>

</html>
