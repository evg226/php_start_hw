<?php
$projectName = "PHP start GB";
$homeWorkNumber = "Домашняя работа №3"
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
            max-width: 950px;
            margin: 0 auto;
            padding: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 32px
        }

        h3 {
            margin-top: 24px
        }

        .footer {
            background: #222222;
            color: #ffffff;
        }

        .main {
            margin: 10px 0;
        }

        p {
            margin: 0;
        }

        a {
            text-decoration: none;
        }

        body {
            height: 100%;
        }

        .page {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .site {
            flex: 1;
        }

        .nav1 {
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            position: relative;
            background: white;
        }

        .nav1 li {
            padding: 8px 16px;
            list-style-type: none;
            cursor: pointer;
        }

        .item:hover {
            display: inline-block;
            transform: scale(1.1);
        }

        .nav1 li:hover .nav2 {
            display: flex;
            flex-direction: column;
        }

        .nav2 {
            margin-top: 6px;
            position: absolute;
            display: none;
            background: white;
            border: 1px solid #222222;
        }

        .nav2 li:hover .nav3 {
            display: block;
        }

        .nav3 {
            margin-left: 30px;
            display: none;
            background: white;
        }
    </style>
</head>
<body>
<div class="page">
    <div class="site">
        <div class="container">

            <?php
            //                Задание 6
            $router = [
                "Главная" => "/",
                "Проекты" => [
                    "Все" => "/projects",
                    "Избарнные" => "/selected",
                    "По типу" => [
                        "Web" => "/projects/web",
                        "Mobile" => "/projects/mobile"
                    ]
                ],
                "Разработчики" => "/developers",
                "О сайте" => "/about",
                "Личный кабинет" => [
                    "Войти" => "/login",
                    "Регистрация" => "/signup",
                    "Админ. панель" => "/admin"
                ]
            ];

            echo navMaker($router, 1);

            function navMaker($router, $classLevel = 0)
            {
                $navBar = "<ul class='nav$classLevel'>";
                foreach ($router as $key => $item) {
                    if (is_array($item)) {
                        $navBar .= "<li><span class='item'>$key</span>";
                        $navBar .= navMaker($item, $classLevel + 1);
                        $navBar .= "</li>";
                    } else {
                        $navBar .= "<li ><a class='item' href=$item>$key</a></li>";
                    }
                }
                $navBar .= "</ul>";
                return $navBar;
            }

            ?>

            <h1 class="header"><?= $homeWorkNumber ?></h1>
            <div class="main">

                <?php
                //        *********************************************************
                echo "<h3>Задание 1 </h3>";
                $max = 100;
                $index = 0;
                echo "<p><b>Делятся на 3 без остатка:</b> ";
                while ($index <= $max) {
                    if ($index % 3 === 0) {
                        echo $index . " ";
                    }
                    $index++;
                }
                echo "</p>"
                ?>

                <?php
                //        ******************************************
                echo "<h3>Задание 2</h3>";
                $max = 10;
                $index = 0;
                do {
                    echo "<p>$index - ";
                    if ($index === 0) {
                        echo "это ноль";
                        continue;
                    }
                    if ($index % 2 === 0) {
                        echo "четное число";
                    } else {
                        echo "нечетное число";
                    }
                } while (++$index <= $max);
                ?>

                <?php
                //        *********************************************
                echo "<h3>Задание 3</h3>";
                $country = [
                    "Московская" => ["Долгопрудный", "Красногорск"],
                    "Ленинградская" => "Петербург",
                    "Свердловская" => ["Екатеринбург", "Нижний Тагил"],
                    "Башкортостан" => ["Уфа", "Ишимбай", "Стерлитамак"],
                    "Москва"
                ];
                foreach ($country as $state => $cities) {
                    echo "<p>";
                    if (is_array($cities)) {
                        echo $state . ":<br>" . implode(", ", $cities) . ".";
                    } else if ($state) {
                        echo $state . ":<br>" . $cities . ".";
                    } else {
                        echo "$cities: $cities.";
                    }
                    echo "</p>";
                }
                ?>

                <?php
                //        *******************************************************************
                echo "<h3>Задание 4,5,9</h3>";
                $str = $_GET["str"];
                echo "<p>Получена строка: $str</p>";
                echo "<p>Транслит: " . makeTranslite($str) . "</p>";
                function makeTranslite($rusStr)
                {
                    $table = ['а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
                        'з' => 'z', 'и' => 'i', 'й' => 'i', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
                        'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'kh', 'ц' => 'tz',
                        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ь' => '', 'ы' => 'y', 'ъ' => '', 'э' => 'e',
                        'ю' => 'yu', 'я' => 'ya', " " => "_"];
                    $arr = preg_split("//u", $rusStr);
                    $result = "";
                    foreach ($arr as $rusletter) {
                        $result .= array_key_exists($rusletter, $table) ? $table[$rusletter] : $rusletter;
                    }
                    return $result;
                }

                ?>

                <?php
                //            ******************************************
                echo "<h3>Задание 6</h3>";
                echo "См. шапка сайта - выше";

                ?>

                <?php
                //            ******************************************
                echo "<h3>Задание 7</h3>";
                for ($i = 0; $i++ < 9; print $i) {
                }
                ?>

                <?php
                //            ******************************************
                echo "<h3>Задание 8</h3>";
                $country = [
                    "Московская" => ["Долгопрудный", "Красногорск"],
                    "Ленинградская" => "Петербург",
                    "Свердловская" => ["Екатеринбург", "Нижний Тагил"],
                    "Башкортостан" => ["Уфа", "Ишимбай", "Стерлитамак", "Красноусольск", "Киргиз-Мияки"],
                    "Кировская" => "Киров",
                    "Москва"
                ];
                foreach ($country as $state => $cities) {
                    echo "<p>";
                    if (is_array($cities)) {
                        foreach ($cities as $key => $city) {
                            if (!checkK($city)) unset($cities[$key]);
                        }
                        echo $state . ":<br>" . implode(", ", $cities) . ".";
                    } else if ($state) {
                        echo $state . ":<br>" . checkK($cities) . ".";
                    } else {
                        echo "$cities: " . checkK($cities) . ".";
                    }
                    echo "</p>";
                }
                function checkK($city)
                {
                    if (mb_substr($city, 0, 1) === "К") return $city;
                    return "";
                }

                ?>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            Задание 5 - © Evg GB 2020-<?php echo date("Y") ?>;
        </div>
    </div>
</div>

</body>
</html>

