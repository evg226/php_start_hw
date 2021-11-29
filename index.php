<?php
    $projectName="PHP start GB";
    $homeWorkNumber="Домашняя работа №2"
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $projectName.": ".$homeWorkNumber?></title>
    <style>
        *{margin:0;padding:0;}
        .container{max-width:950px;margin: 0 auto; padding: 10px;}
        h1{ text-align: center;margin-bottom: 32px}
        h3{margin-top: 24px}
        .footer {background: #222222;color:#ffffff;}
        .main{ margin: 10px 0;}
        p{margin: 0;}
        body{height:100%;}
        .page {
            display:flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .site{flex:1;}
    </style>
</head>
<body>
<div class="page">
<div class="site">
    <div class="container">
    <h1 class="header"><?=$homeWorkNumber?></h1>
    <div class="main">

        <?php
//        *********************************************************************************
        echo "<h3 class='header'>Задание 1</h3><br>";
        $a=-16;
        $b=0;
        if ($a>=0 && $b>=0) {
            $oper="-";
            $result=$a-$b;
        } elseif ($a<0 && $b<0) {
            $oper="*";
            $result=$a*$b;
        } else {
            $oper="+";
            $result=$a+$b;
        }
        echo "<p>($a) $oper ($b) = ($result)</p>";
        ?>

        <?php
//        ********************************************************************************
        echo "<h3 class='header'>Задание 2</h3><br>";
        $a=rand(0,15);
        echo "<p>";
        switch ($a){
            case 0: echo " ". $a++;
            case 1: echo " ". $a++;
            case 2: echo " ". $a++;
            case 3: echo " ". $a++;
            case 4: echo " ". $a++;
            case 5: echo " ". $a++;
            case 6: echo " ". $a++;
            case 7: echo " ". $a++;
            case 8: echo " ". $a++;
            case 9: echo " ". $a++;
            case 10: echo " ". $a++;
            case 11: echo " ". $a++;
            case 12: echo " ". $a++;
            case 13: echo " ". $a++;
            case 14: echo " ". $a++;
            case 15: echo " ". $a++;
        }
        echo "</p>";
        ?>

        <?php
//        ***************************************************************************
        echo "<h3 class='header'>Задания 3 и 4</h3><br>";
//        задание 3
        function add ($var1,$var2){
            return $var1+$var2;
        }

        function sub ($var1,$var2){
            return $var1-$var2;
        }

        function mult ($var1,$var2){
            return $var1*$var2;
        }

        function div ($var1,$var2){
            return $var1/$var2;
        }
//        Задание 4
        function mathOperation($oper,$arg1,$arg2){
            switch ($oper){
                case "+":
                    return $arg1+$arg2;
                case "-":
                    return $arg1-$arg2;
                case "*":
                    return $arg1*$arg2;
                case "/":
                    return $arg2===0?"<span style='color:red'>ERR</span>: деление на 0!":$arg1/$arg2;
                default:
                    return "Операция не определена";
            }
        }
        $a=10;
        $b=5;
        $oper="+";
        echo "<p>($a) $oper ($b) = (".mathOperation($oper,$a,$b).")</p>";
        $oper="-";
        echo "<p>($a) $oper ($b) = (".mathOperation($oper,$a,$b).")</p>";
        $oper="*";
        echo "<p>($a) $oper ($b) = (".mathOperation($oper,$a,$b).")</p>";
        $oper="/";
        echo "<p>($a) $oper ($b) = (".mathOperation($oper,$a,$b).")</p>";
        $oper="/";
        echo "<p>($a) $oper (0) = (".mathOperation($oper,$a,0).")</p>";
        $oper="%";
        echo "<p>($a) $oper (0) = (".mathOperation($oper,$a,0).")</p>";
        ?>

        <?php
        // задание 5
        //        ****************************************************************
        $currentYear=date("Y");
        // вывод в блоке footer - ниже
        ?>

        <?php
        // задание 6
        //        ****************************************************************
        echo "<h3 class='header'>Задание 6</h3><br>";
        function powRecur($a,$n){
            if ($n<0) return "<span style='color:red'>ERR</span>: Неверный аргумент";
            if ($n===0) return 1;
            if ($n===1) return $a;
            return $a*powRecur($a,$n-1);
        }

        echo "<p>".powRecur(10,1)."</p>";
        echo "<p>".powRecur(10,0)."</p>";
        echo "<p>".powRecur(10,10)."</p>";
        echo "<p>".powRecur(-10,3)."</p>";
        echo "<p>".powRecur(10,-1)."</p>";
        ?>

        <?php
        // задание 7
        //        ****************************************************************
        echo "<h3 class='header'>Задание 7</h3><br>";

        $hour=date("H");
        $min=date("m");

        switch ($hour) {
            case 1:
            case 21:
                $hourDesc = "час";
                break;
            case 2:
            case 3:
            case 4:
            case 22:
            case 23:
            case 24:
                $hourDesc = "часа";
                break;
            default:
                $hourDesc = "часов";
        }

        if ($min==="11"||$min==="12"||$min==="13"||$min==="14"){
            $minDesc="минут";
        } else {
            $minEnd=substr($min, -1);
            switch ($minEnd) {
                case 1:
                    $minDesc = "минута";
                    break;
                case 2:
                case 3:
                case 4:
                    $minDesc = "минуты";
                    break;
                default:
                    $minDesc = "минут";
            }
        }

        echo "<p>$hour $hourDesc $min $minDesc</p>";
        ?>
    </div>
    </div>
</div>

<div class="footer">
    <div class="container">
        Задание 5 - © Evg GB 2020-<?=$currentYear?>;
    </div>
</div>
</div>

</body>
</html>

