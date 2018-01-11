<?php

/**
 * Created on 03.08.2016
 * By NetBeans IDE 8.1
 * Author: Andrey Zashchepkin 
 *
 * 
 * ******** Contacts:*********
 * my e-mails - yaslonane@yandex.ru
 *            - andrey@zashchepkin.ru
 *            - info@zashchepkin.ru
 *  my site     zashchepkin.ru 
 * ********  end contacts *********
 * 
 *
 * Copyright zashchepkin.ru © 2016. All Rights Reserved.
 * License https://opensource.org/licenses/mit-license.php MIT License (MIT)
 *
 *
 * Description of cartController
 *
 * @author andrey
 * */
class OneController {
    //put your code here
    public function actionIndex($a = "page-1", $b = "default", $c = "default"){ 
        
        echo 'One Controller  Action index';
        echo "Param #1: ". $a . "<br />";
        echo "Param #2: ". $b . "<br />";
        echo "Param #3: ". $c . "<br />";
        
        return true;
    }
    
    public function actionCategory($name_cat, $page = "page-1"){
        
        echo 'One Controller  Action Category';
        echo "Name category: ". $name_cat . "<br />";
        echo "Page: ". $page . "<br />";

        
        return true;
    }
    
    public function actionPost($alias_post){
        
        echo 'One Controller  Action Post<br />';
        echo "Name Post: ". $alias_post . "<br />";

        
        return true;
    }
    
    public function actionAddAjax($id){
        
        echo Cart::addProduct($id);
        return true;
    }
    
}
