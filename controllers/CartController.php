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
class CartController {
    //put your code here
    public function actionIndex(){ 
        $categories = array();
        $categories = Category::getCategoriesList();
        
        $productsInCart = false;
        
        $productsInCart = Cart::getProducts();
        
        if($productsInCart){
            
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);
            
            $totalPrice = Cart::getTotalPrice($products);
        }
        
        require_once(ROOT . TMPL .'cart.php');
        
        return true;
    }
    
    public function actionAdd($id){
        
        Cart::addProduct($id);
        echo '<pre>';        print_r($_SESSION['products']); die();
        
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }
    
    public function actionAddAjax($id){
        
        echo Cart::addProduct($id);
        return true;
    }
    
}
