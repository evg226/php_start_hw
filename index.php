<?php
$projectName = "PHP start GB";
$homeWorkNumber = "Домашняя работа №4"
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
        * {
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 0 auto;
            padding: 6px;
            min-width: 360px;
            max-width: 960px;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -8px;
        }

        .gallery__item {
            flex: 0 0 150px;
            height: 180px;
            margin: 8px;
            padding: 8px;
            border: 1px solid #888888;
            cursor: pointer;
        }

        .gallery__item:hover {
            box-shadow: 0 0 10px #888888;
        }

        .gallery__item img {
            width: 100%;
        }

        .modal {
            /*display: none;*/
            width: 80%;
            max-width: 500px;
            max-height: 90%;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            border: 1px solid #888888;
            padding: 0 16px 16px;
            background: #ffffff;
        }

        .modal img {
            width: 100%;
        }

        .modal_close {
            position: absolute;
            right: 5px;
            top: 5px;
            background: #aaaaaa;
            border-radius: 50%;
            padding: 2px 6px;
            cursor: pointer;
            color: #ffffff;
        }

        .modal__back {
            /*display: none;*/
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 100;
            opacity: 0.7;
            background: #eeeeee;
        }

    </style>
</head>
<body>
<!--*************************************************************-->
<!--Решение пп.1-3-->
<?php
$imgDir = "img";
$imgList = scandir($imgDir);
$filter = $_GET['filter'];
$currentBig = $_GET['currentBig'];
$imgBigList = glob($imgDir . "/big/$filter*");
if (!$currentBig) $currentBig = 0;
$nextBig = $currentBig + 1;
if ($nextBig >= count($imgBigList)) $nextBig = 0;
?>

<div class="container">
    <h1><?= $projectName . ": " . $homeWorkNumber ?></h1>
    <h2>Галерея рисунков</h2>
    <div class="gallery">
        <?php
        foreach ($imgList as $key => $img) {
            if (!is_dir("$imgDir/$img")) {
                $pic = pathinfo($img)['filename'];
                echo
                "<a href='?filter=$pic' class='gallery__item'>
                    <img src=$imgDir/$img alt=$pic>
                    <p>$pic</p>
                </a>";
            };
        };
        ?>
    </div>
</div>
<?php
$bigFileName = pathinfo($imgBigList[$currentBig])['filename'];
if ($filter) {
    $result = "<div  class='modal'>
                        <a href='/' class='modal_close'>X</a>
                        <a href='/?filter=$filter&currentBig=$nextBig'>
                            <h2>Рисунок $bigFileName</h2>
                            <img src=$imgBigList[$currentBig] alt='Рисунок $bigFileName'>
                        </a>
                    </div>
                    <a href='/' class='modal__back'></a>";
    echo $result;
}
?>

</body>

</html>
