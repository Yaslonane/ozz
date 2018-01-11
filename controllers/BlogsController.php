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
class BlogsController {
    //put your code here
    public static $title = "AVTOZONA | Блог";
        /*
         * 
         * вывод страницы
         *
         * 
         */
    public function actionIndex($page = 1){
        
        //$inf = info::getInfo();
        
        $total = Blogs::getTotalPostsInCategory();
        
        $pagination = new Pagination($total, $page, /*Blogs::SHOW_BY_DEFAULT*/6, 'page-');
        
        $posts = Blogs::getPreviewPost($categoryId = false, $page);
        $categoryList = Blogs::getListCategory(true);
        //$cat_list_for_post = Blogs::getCategoryByIds($posts['id']);
        //$a = Blogs::getPreviewPost();
        //var_dump($a);
        
        require_once(ROOT . TMPL . 'blogs.php');
        
        return true;
    }
    
    public function actionCategory($categoryId, $page = 1){
        
        //$inf = info::getInfo();
        echo "Hello people".$categoryId. "page --". $page;
        
        $total = Blogs::getTotalPostsInCategory($categoryId);
        
        $pagination = new Pagination($total, $page, /*Blogs::SHOW_BY_DEFAULT*/6, 'page-');
        
        $posts = Blogs::getPreviewPost($categoryId, $page);
        
        $categoryList = Blogs::getListCategory(true);
        
        //$cat_list_for_post = Blogs::getCategoryByIds($posts['id']);
        //$a = Blogs::getPreviewPost();
        //var_dump($a);
        
        require_once(ROOT . TMPL . 'blogs.php');
        
        return true;
    }
    
    public function actionView($id) { //функция вывода одного товара с подробным описание по Id
        
        
        $post = Blogs::getOnePostById($id);
        
        $categoryList = Blogs::getListCategory(true);
        
        require_once(ROOT . TMPL . 'blog-single.php');
        
        return true;
    }
        /* 
         * конец вывода
         */

}
