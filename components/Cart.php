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
 * Description of Cart
 *
 * @author andrey
 * */
class Cart {
    //put your code here
    public static function addProduct($id){
        
        $id = intval($id);
        
        $productsInCart = array();
        
        if(isset($_SESSION['products'])){
            $productsInCart = $_SESSION['products'];
        }
        
        if(array_key_exists($id, $productsInCart)){
            $productsInCart[$id]++;
        }else{
           $productsInCart[$id] = 1; 
        }
        
        $_SESSION['products'] = $productsInCart;
        
        return self::countItems();
    }
    
    public static function countItems(){
        
        if(isset($_SESSION['products'])){
            $count = 0;
            foreach($_SESSION['products'] as $id => $quantity){
                $count += $quantity; 
            }
            return $count;
        }else{
            return 0;
        }
    }
    
    public static function getProducts(){
        
        if(isset($_SESSION['products'])){
            return $_SESSION['products'];
        }
        return false;
    }
    
    public static function getTotalPrice(){
        
    }
}
