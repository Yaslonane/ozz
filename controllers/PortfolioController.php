<?php

/*
 * контроллер продуктов
 */

class PortfolioController {
    
//put your code here
    
    public static $title = "Портфолио";
    
    
    public function actionIndex() { 
        
        //$portfolio = portfolio::getAlbums('active'); //вывод 
        $albums = Gallery::getAlbumInImages();
        //var_dump($albums);
        require_once(ROOT . TMPL .'gallery.php');
        
        return true;
    }
    
    public function actionView($id) { //функция вывода одного альбома по Id
        
        //$portfolio = portfolio::getAlbumByID($id); //вывод 
        echo $id;
        
        require_once(ROOT . TMPL .'portfolio_only.php');
        
        return true;
    }
}
