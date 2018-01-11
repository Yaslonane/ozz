<?php

/* 
 *
 */

class MainController{
    
    public static $title = "Site";
        /*
         * 
         * вывод главной страницы
         *
         * 
         */
    public function actionIndex($a = "default", $b = "default", $c = "default"){ 
        
        echo "Site home page";
        echo "Param #1: ". $a . "<br />";
        echo "Param #2: ". $b . "<br />";
        echo "Param #3: ". $c . "<br />";
        
        //require_once(ROOT . TMPL .'index.php');
        
        return true;
    }
    
    public function action404(){
        
        echo "error 404";
        return true;
    }
    
    public function actionAbout(){
        
        $inf = info::getInfo();
        
        //echo "<pre>";
        //var_dump($inf);
        //echo "</pre>";
        require (ROOT . TMPL . 'about.php');
        return true;
    }

        public function actionUploads(){

            if($_FILES['upload']){
            if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name'])) ){
                $message = "Вы не выбрали файл";
            }
            else if ($_FILES['upload']["size"] == 0 OR $_FILES['upload']["size"] > 2050000)
            {
            $message = "Размер файла не соответствует нормам";
            }
            else if (($_FILES['upload']["type"] != "image/jpeg") AND ($_FILES['upload']["type"] != "image/jpeg") AND ($_FILES['upload']["type"] != "image/png"))
            {
            $message = "Допускается загрузка только картинок JPG и PNG.";
            }
            else if (!is_uploaded_file($_FILES['upload']["tmp_name"]))
            {
            $message = "Что-то пошло не так. Попытайтесь загрузить файл ещё раз.";
            }
            else{
            $name =rand(1, 1000).'-'.md5($_FILES['upload']['name']).'.'.self::getex($_FILES['upload']['name']);
            move_uploaded_file($_FILES['upload']['tmp_name'], "images/".$name);
            $full_path = DOMAIN . '/images/content/'.$name;
            $message = "Файл ".$_FILES['upload']['name']." загружен";
            $size=@getimagesize('images/content/'.$name);
            if($size[0]<50 OR $size[1]<50){
            unlink('images/content/'.$name);
            $message = "Файл не является допустимым изображением";
            $full_path="";
            }
            }
            $callback = $_REQUEST['CKEditorFuncNum'];
            echo '<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction("'.$callback.'", "'.$full_path.'", "'.$message.'" );</script>';
            }

    }
    
    private static function getex($filename) {
        
        return end(explode(".", $filename));
            
    }
        /* 
         * конец вывода главной страницы 
         */
}
