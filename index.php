<?php
$projectName = "PHP start GB";
$homeWorkNumber = "Домашняя работа №5";
include "connect.php";
include "utilities.php";
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $projectName . ": " . $homeWorkNumber ?></title>
</head>
<link rel="stylesheet" href="style.css">
<body>

<!--отображение галереи-->
<div class="container">
    <h1 class="title"><?= $projectName . ": " . $homeWorkNumber ?></h1>
    <h2 class="title">Галерея рисунков</h2>
    <div class="gallery">
        <!--        Кнопка добавления группы рисунков-->
        <a href='/?action=insert' class='gallery__item'>
            <img src="img/plus.jpg" alt=$pic>
            <p>Добавить</p>
        </a>
        <?php
        //        сортировка по посещениям
        $query = "SELECT * FROM gallery order by visits DESC";
        $res = mysqli_query($connection, $query);
        while ($data = mysqli_fetch_assoc($res)): ?>
            <a href="?showBig=<?= $data['id'] ?>&visits=<?= $data['visits'] ? $data['visits'] : 0 ?>"
               class='gallery__item'>
                <img src='<?= $data['path'] ?>'>
                <p class="gallery__item_title">
                    <span><?= $data['title'] ?></span>
                    <!--                    счетчик посещений-->
                    <span class="gallery__item_visits"><?= $data['visits'] ?></span>
                </p>
            </a>
        <?php endwhile; ?>
    </div>
</div>

<?php
//отображение группы больших рисунков в модальном окне
$showBig = $_GET['showBig'];
if ($showBig) {
    $queryBig = "select * FROM image WHERE galleryId=$showBig";
    $resBig = mysqli_query($connection, $queryBig);
    $imgBigList = [];
    while ($data1 = mysqli_fetch_assoc($resBig)) {
        array_push($imgBigList, $data1);
    }
    $currentBig = $_GET['currentBig'];
    if (!$currentBig) $currentBig = 0;
    $nextBig = $currentBig + 1;
    $bigName = $imgBigList[$currentBig]['title'];
    $bigFile = $imgBigList[$currentBig]['path'];
    $currentBigId = $imgBigList[$currentBig]['id'];
    if ($nextBig >= count($imgBigList)) $nextBig = 0;
    //    ***********************************************************
    //    счетчик посещений
    $visits = $_GET['visits'] + 1;
    $queryVisits = "UPDATE gallery SET visits = $visits WHERE id=$showBig";
    mysqli_query($connection, $queryVisits);
    $result = "<div class='modal'>
                   <a href='/' class='modal_close'>X</a>
                        <h2 class='change_header'>$bigName
                            <form class='change' method='post'>
                                <input type='text' name='groupHeader' placeholder='Новый заголовок группы'>
                                <input type='text' name='bigHeader' placeholder='Новый заголовок текущей'>
                                <input type='submit' name='updateHeader' value='Изменить'>
                            </form>
                         </h2>
                         
                   <a class='modal__a' href='/?showBig=$showBig&currentBig=$nextBig'>
                         <img src=$bigFile alt='$bigName'>
                         <div class='modalnext'> &gt; </div>
                         <form class='deleteForm' method='post'>
                            <input type='submit' name='removeGroup' value='Удалить группу'>";
    if (count($imgBigList) > 1) $result .= "<input type='submit' name='removeActive' value='Удалить текущую'>";
    $result .= "              <p>Просмотров: $visits</p>  
                          </form>
                   </a>
                 </div>
                 <a href='/' class='modal__back'></a>";
    echo $result;


}

//Добавление элементов
if ($_GET['action'] === "insert") {  // отображение окна
    echo $_GET['action'] . "<div  class='modal'>
              <a href='/' class='modal_close'>X</a>
              <h2>Добавление элемента</h2>
              <form action='/' class='add' method='post' enctype='multipart/form-data'>
                <input type='text' name='title' multiple placeholder='Название группы'>
                <input type='file' name='userFiles[]' multiple placeholder='Выберите рисунки' accept='.jpg,.jpeg,.png'>
                <div>
                <input type='submit' name='insertToDB' value='Загрузить'>
                <a href='/'>Закрыть</a>
                </div>
              </form>
              </a>
           </div>
           <a href='/' class='modal__back'></a>";
} elseif (isset($_POST['insertToDB'])) {
//    print_r($_FILES['userFiles']);
    $smallFile = $_FILES['userFiles']['tmp_name'][0];
    $smallType = explode(".", $_FILES['userFiles']['name'][0])[1];
    $fileName = date("Ymdhis");
    $smallPath = "./img/$fileName.$smallType";
    if (!$_POST['title']) die();
    $title = $_POST['title'];

    if (copy($smallFile, $smallPath)) { //первая картика будет иконкой (уменьшенной) в галерее
        changeImage(150, 150, $smallFile, "./img/$fileName.$smallType", $smallType);
        $query = "INSERT gallery (title,description,path) VALUES ('$title','picture description','$smallPath')";
        mysqli_query($connection, $query);
        $galleryId = mysqli_insert_id($connection);

        // загрузка больших рисунков
        foreach ($_FILES['userFiles']['tmp_name'] as $key => $file) {
            $bigPath = "./img/big/$key$fileName.$smallType";
            if (copy($file, $bigPath)) {
                $query = "INSERT image (title,description,path,galleryId) VALUES ('$title','picture description','$bigPath',$galleryId)";
                mysqli_query($connection, $query);
                header("Location: index.php");
            }
        }
    }
}

//Удаление
if (isset($_POST['removeGroup'])) {
//    echo "Удаляем группу" . $showBig;
    $query = "DELETE FROM image WHERE galleryId=$showBig";
    mysqli_query($connection, $query);
    $query = "DELETE FROM gallery WHERE id=$showBig";
    mysqli_query($connection, $query);
    header("Location: index.php");
} elseif (isset($_POST['removeActive'])) {
//    echo "Удаляем текущую картинку группы" . $currentBigId;
    $query = "DELETE FROM image WHERE id=$currentBigId";
    mysqli_query($connection, $query);
    header("Location: index.php");
} elseif (isset($_POST['updateHeader'])) {
//    Изменение заголовка
    $newHeader = $_POST['groupHeader'];
    $newBigHeader = $_POST['bigHeader'];
    echo "Изменяем заголовок группы " . $showBig;
    $query = "UPDATE gallery SET title = '$newHeader' WHERE id=$showBig";
    if ($newHeader) mysqli_query($connection, $query);
    $queryBig = "UPDATE image SET title = '$newBigHeader' WHERE id=$currentBigId";
    if ($newBigHeader) mysqli_query($connection, $queryBig);
    header("Location: index.php?showBig=$showBig&currentBig=$currentBig");
}

?>

</body>

</html>
