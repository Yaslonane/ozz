<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Uploads
 *
 * @author andrey
 */
class Uploads {
    //put your code here
    
    public static function images(){
        
        $uploaddir = "img/";
        // это папка, в которую будет загружаться картинка
        $apend = $_FILES['img']['name']; 
        // это имя, которое будет присвоенно изображению 
        $uploadfile = "$uploaddir$apend"; 
        //в переменную $uploadfile будет входить папка и имя изображения

        // В данной строке самое важное - проверяем загружается ли изображение (а может вредоносный код?)
        // И проходит ли изображение по весу. В нашем случае до 512 Кб
        if(($_FILES['img']['type'] == 'image/gif' || $_FILES['img']['type'] == 'image/jpeg' || $_FILES['img']['type'] == 'image/png') && ($_FILES['img']['size'] != 0 and $_FILES['img']['size']<=151200000)) 
        { 
        // Указываем максимальный вес загружаемого файла. Сейчас до 512 Кб 
          if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) 
           { 
           //Здесь идет процесс загрузки изображения 
           $size = getimagesize($uploadfile); 
           // с помощью этой функции мы можем получить размер пикселей изображения 
             if ($size[0] < 50001 && $size[1]<150001) 
             { 
             // если размер изображения не более 500 пикселей по ширине и не более 1500 по  высоте 
             return $uploadfile; 
             } else {
             $_SESSION['errors'][] = "Загружаемое изображение превышает допустимые нормы (ширина не более - 500; высота не более 1500)"; 
             unlink($uploadfile); 
             // удаление файла 
             } 
           } else {
           $_SESSION['errors'][] = "Файл не загружен, вернитеcь и попробуйте еще раз";
           } 
        } else { 
        $_SESSION['errors'][]= "Размер файла не должен превышать 512Кб";
        } 
    }
}
