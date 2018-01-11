<?php

/**
 * Description of AdminPanelController
 *
 * @author andrey
 */
class AdminpanelController extends AdminBase{
    //put your code here
    public static $title = "AVTOZONA | Админпанель";
    
    public function actionIndex(){
        
        self::checkAdmin();
        $message = false;
        if(isset($_POST['save'])){
            //$message = Services::updateService();
            $message = info::updateInfo();
        }
        $gen_inf = info::getInfo();
        
        require_once (ROOT . ADM_TMPL . 'index.php');
        
        return true;
        
    }
    
    public function actionServices(){
        
        self::checkAdmin();
        
        $servicesList = Services::getAllServicesAdmin();
        
        //var_dump($servicesList);
        
        require_once (ROOT . ADM_TMPL . 'services.php');
        
        return true;
        
    }
    
    public function actionUpdateservices($id){
        
        self::checkAdmin();
        
        if(isset($_POST['save'])){
            $message = Services::updateService();
            
            //var_dump($_SESSION);
            //var_dump($_POST);
            //var_dump($_FILES);
        }
        
        $service = Services::getServiceById($id);
        
        //var_dump($service);
        
        require_once (ROOT . ADM_TMPL . 'service_edit.php');
        
        return true;
        
    }
    
    public function actionCreateservices(){
        
        self::checkAdmin();
        
        if(isset($_POST['create'])){
            
            $id = Services::createServ($_POST['name']);
            //var_dump($_SESSION);
            //var_dump($_POST);
            //var_dump($_FILES);
            //var_dump($id);
            header ('Location: '.DOMAIN .'/adminpanel/updateservices/'.$id);
        }
        
    }
    
    public function actionDelserv($id){
        
        self::checkAdmin();

        $del = Services::delServ($id);
            //var_dump($_SESSION);
            //var_dump($_POST);
            //var_dump($_FILES);
            //var_dump($id);
        if($del){
            header ('Location: '.DOMAIN .'/adminpanel/services/'); 
        }
    }
    
    public function actionPublicserv($id){
        
        self::checkAdmin();

        $pub = Services::changeIsPublic($id);
            //var_dump($_SESSION);
            //var_dump($_POST);
            //var_dump($_FILES);
            //var_dump($id);
        if($pub){
            header ('Location: '.DOMAIN .'/adminpanel/services/'); 
        }
    }
    
    public function actionPostedit($id){
        
        self::checkAdmin();
        
        if(isset($_POST['save'])){
            $message = Blogs::savePost();
            
            //var_dump($_SESSION);
            //var_dump($_POST);
            //var_dump($_FILES);
        }
        
        $category = Blogs::getListCategory();
        
        $cat_in_post = Blogs::getCategoryByIds($id);
        
        $post = Blogs::getOnePostByIdAdmin($id);
        
        
        
        //var_dump($category);
        //var_dump($cat_in_post);
        
        require_once (ROOT . ADM_TMPL . 'post_edit.php');
        
        return true;
        
    }
    
    public function actionPosts(){
        
        self::checkAdmin();
        
        $posts = Blogs::getAllPostsAdmin();
        
        //var_dump($posts);
        
        require_once (ROOT . ADM_TMPL . 'posts.php');
        
        return true;
        
    }
    
        public function actionCreatepost(){
        
        self::checkAdmin();
        
        if(isset($_POST['create'])){
            
            $id = Blogs::createPost($_POST['name']);
            //var_dump($_SESSION);
            //var_dump($_POST);
            //var_dump($_FILES);
            //var_dump($id);
            header ('Location: '.DOMAIN .'/adminpanel/posts/'.$id);
        }
        
    }
    
        public function actionDelpost($id){
        
        self::checkAdmin();

        $del = Blogs::delPost($id);
            //var_dump($_SESSION);
            //var_dump($_POST);
            //var_dump($_FILES);
            //var_dump($id);
        if($del){
            header ('Location: '.DOMAIN .'/adminpanel/posts/'); 
        }
    }
    
    public function actionPublicpost($id){
        
        self::checkAdmin();

        $pub = Blogs::changeIsPublic($id);
            //var_dump($_SESSION);
            //var_dump($_POST);
            //var_dump($_FILES);
            //var_dump($id);
        if($pub){
            header ('Location: '.DOMAIN .'/adminpanel/posts/'); 
        }
    }
    
    
    
    public function actionCategoryedit($id){
        
        self::checkAdmin();
        
        if(isset($_POST['save'])){
            $message = Blogs::saveCat();
            
            //var_dump($_SESSION);
            //var_dump($_POST);
            //var_dump($_FILES);
        }
        
        $category = Blogs::getListCategoryByIdAdmin($id);
        
        //var_dump($category);
        //var_dump($cat_in_post);
        
        require_once (ROOT . ADM_TMPL . 'cat_edit.php');
        
        return true;
        
        
    }
    
    public function actionCategory(){
        
        self::checkAdmin();
        
        $categoryList = Blogs::getListCategoryAdmin();
        
        //var_dump($posts);
        
        require_once (ROOT . ADM_TMPL . 'cat.php');
        
        return true;
        
    }
    
    public function actionCreatecat(){
        
        self::checkAdmin();
        
        if(isset($_POST['create'])){
            
            $id = Blogs::createCat($_POST['name']);
            //var_dump($_SESSION);
            //var_dump($_POST);
            //var_dump($_FILES);
            //var_dump($id);
            header ('Location: '.DOMAIN .'/adminpanel/category/'.$id);
        }
        
    }
    
        public function actionDelcat($id){
        
        self::checkAdmin();

        $del = Blogs::delCat($id);
            //var_dump($_SESSION);
            //var_dump($_POST);
            //var_dump($_FILES);
            //var_dump($id);
        if($del){
            header ('Location: '.DOMAIN .'/adminpanel/category/'); 
        }
    }
    
    public function actionPubliccat($id){
        
        self::checkAdmin();

        $pub = Blogs::changeIsPublicCat($id);
            //var_dump($_SESSION);
            //var_dump($_POST);
            //var_dump($_FILES);
            //var_dump($id);
        if($pub){
            header ('Location: '.DOMAIN .'/adminpanel/category/'); 
        }
    }
    
    
    
    
    
    public function actionGalleryedit($id){
        
        self::checkAdmin();
        
        if(isset($_POST['save'])){
            $message = Gallery::saveAlbum();
            
            //var_dump($_SESSION);
            //var_dump($_POST);
            //var_dump($_FILES);
        }
        
        $album = Gallery::getAlbumById($id);
        
        require_once (ROOT . ADM_TMPL . 'gallery_edit.php');
        
        return true;
        
    }
    
    public function actionGallery(){
        
        self::checkAdmin();
        
        $galleryList = Gallery::getAllAlbums('admin');
        
        require_once (ROOT . ADM_TMPL . 'gallery.php');
        
        return true;
        
    }
    
    public function actionCreategallery(){
        
        self::checkAdmin();
        
        if(isset($_POST['create'])){
            
            $id = Gallery::createAlbum($_POST['name']);
            //var_dump($_SESSION);
            var_dump($_POST);
            //var_dump($_FILES);
            //var_dump($id);
            header ('Location: '.DOMAIN .'/adminpanel/gallery/'.$id);
        }
        
    }
    public function actionGallerydel($id){
        
        self::checkAdmin();
        
        $del = Gallery::delAlbum($id);
            //var_dump($_SESSION);
            //var_dump($_POST);
            //var_dump($_FILES);
            //var_dump($id);
        if($del){
            header ('Location: '.DOMAIN .'/adminpanel/gallery/'); 
        }
        
    }
    
    public function actionPublicgallery($id){
        
        self::checkAdmin();
        
        $pub = Gallery::changeIsPublicAlbum($id);
            //var_dump($_SESSION);
            //var_dump($_POST);
            //var_dump($_FILES);
            //var_dump($pub);
        if($pub){
            header ('Location: '.DOMAIN .'/adminpanel/gallery'); 
        }
        
    }
    
    
    /*
    public function actionUsersedit($id){
        
        self::checkAdmin();
        
        $user = User::getUserById($id);
        
        var_dump($user);
        
        echo "Admin edit Users " . $id ;
        return true;
        
    }
    
    public function actionUsers(){
        
        self::checkAdmin();
        
        $users = User::getAllUsers();
        
        var_dump($users);
        
        echo "Admin all Users ";
        return true;
        
    }*/
}
