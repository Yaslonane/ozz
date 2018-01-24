<?php
/**
 * Description of ServicesController
 *
 * @author andrey
 */
class ServicesController{
    //put your code here
    public static $title = "Услуги";
        /*
         * 
         * вывод страницы
         *
         * 
         */
    
    public function actionView($id=1) { //функция вывода одного товара с подробным описание по Id
        
        $srvlst = Services::getServicesLst();
        $service = Services::getServiceById($id);
        
        require_once(ROOT . TMPL . 'service_only.php'); //вызываем файл вида страницы с товаром и передаем Id
        
        return true;
    }
        /* 
         * конец вывода
         */
}

