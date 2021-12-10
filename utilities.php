<?php
//Вспомогальтельная функция
function changeImage($h, $w, $src, $newsrc, $type)
{
    $newimg = imagecreatetruecolor($h, $w);
    switch ($type) {
        case 'jpg':
        case 'jpeg':
            $img = imagecreatefromjpeg($src);
            imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
            imagejpeg($newimg, $newsrc);
            break;
        case 'png':
            $img = imagecreatefrompng($src);
            imagecopyresampled($newimg, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
            imagepng($newimg, $newsrc);
            break;
    }
}

?>