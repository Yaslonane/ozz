<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BlogsComtroller
 *
 * @author andrey
 */
class GalleryController {
    //put your code here
    public static $title = "AVTOZONA | Галлерея";
        /*
         * 
         * вывод страницы
         *
         * 
         */
    public function actionIndex(){
        
        $albums = Gallery::getAlbumInImages();
        
        
        
        /*echo "<pre>";
        var_dump($albums);
        echo "</pre>";*/
        require_once(ROOT . TMPL . 'gallery.php');
        
        return true;
    }
    
    
        /* 
         * конец вывода
         */

}
