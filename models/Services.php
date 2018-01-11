<?php
/**
 * Description of Services
 *
 * @author andrey
 */
class Services {
    //put your code here
    
    public static function getAllServices(){ //получаем все услуги
        
        $db = Db::getConnection(); //инициализируем подключение к бд
        
        $servicesList = array(); //инициализируем переменную 
        
        $result = $db->query('SELECT * FROM services WHERE is_publication = 1'); // получаем из базы список
        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $i = 0;
        while($row = $result->fetch()){
            foreach($row as $key => $value) { //перебираем массив полученный из бд и формируем массив для вывода на страницу сайта
                $servicesList[$i][$key] = $value;
            }
            $i++;
        }
        return $servicesList; //возвращаем массив
    }
    
    public static function getAllServicesAdmin(){ //получаем все услуги
        
        $db = Db::getConnection(); //инициализируем подключение к бд
        
        $servicesList = array(); //инициализируем переменную 
        
        $result = $db->query('SELECT * FROM services'); // получаем из базы список
        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $i = 0;
        while($row = $result->fetch()){
            foreach($row as $key => $value) { //перебираем массив полученный из бд и формируем массив для вывода на страницу сайта
                $servicesList[$i][$key] = $value;
            }
            $i++;
        }
        return $servicesList; //возвращаем массив
    }
    
    public static function getLimitServices($limit = 3){ //получаем случайные услуги
        
        $db = Db::getConnection(); //инициализируем подключение к бд
        
        $servicesList = array(); //инициализируем переменную 
        
        $sql = "SELECT * FROM services WHERE is_publication = 1 ORDER BY RAND() LIMIT ". intval($limit) . "";
        
        $result = $db->query($sql); // получаем из базы список
        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $i = 0;
        while($row = $result->fetch()){
            foreach($row as $key => $value) { //перебираем массив полученный из бд и формируем массив для вывода на страницу сайта
                $servicesList[$i][$key] = $value;
            }
            $i++;
        }
        return $servicesList; //возвращаем массив
    }
    
    public static function getServiceById($id){
        
        $id = intval($id);
        
        if($id){
            $db = Db::getConnection();
            
            $result = $db->query('SELECT * FROM services WHERE id='.$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row = $result->fetch();
            
            foreach($row as $key => $value) { 
                    $service[$key] = $value;
                }
            
            return $service;
        }
    }
    
    private static function changeDateToUnix($date){
        
        $arr_date = explode("-", $date);
        $U_date = mktime(0,0,0,$arr_date[0],$arr_date[1],$arr_date[2]);
        
        return $U_date;
    }
    
    public static function updateService(){
        
        $db = Db::getConnection();
        
        $id = $_POST['id'];
        $title = $_POST['title'];
        $name = $_POST['name'];
        $date = self::changeDateToUnix($_POST['date']);
        $autor = $_POST['autor'];
        $is_publication = $_POST['is_publication'];
        $text_mini = $_POST['text_mini'];
        $text = $_POST['text'];
        $meta_kw = $_POST['meta_kw'];
        $meta_d = $_POST['meta_d'];
        $img = $_POST['img'];

        
        $stmt = $db->prepare("UPDATE services set title = :title, name = :name,  date = :date, autor = :autor, is_publication = :is_publication, text_mini=:text_mini, text = :text, meta_kw = :meta_kw, meta_d = :meta_d, img = :img WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':autor', $autor);
        $stmt->bindParam(':is_publication', $is_publication);
        $stmt->bindParam(':text_mini', $text_mini);
        $stmt->bindParam(':text', $text);
        $stmt->bindParam(':meta_kw', $meta_kw);
        $stmt->bindParam(':meta_d', $meta_d);
        $stmt->bindParam(':img', $img);
        
        $stmt->execute();
        
        if($stmt->rowCount() > 0) return "Запись обновлена";
        else return "error!!!";

    }
    
    public static function createServ($name){
        
        $db = Db::getConnection();
        
        $stmt = $db->prepare("INSERT INTO services (name) VALUES (:name)");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        
        return $db->lastInsertId();
    }
    
    public static function delServ($id){
        
        $db = Db::getConnection();
        
        $stmt = $db->prepare("DELETE FROM services WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return true;
    }
    
    public static function changeIsPublic($id){
        
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM services WHERE id='.$id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        
        $is_publication = $row['is_publication'];
        
        if($is_publication == 0) $is_publication_new = 1;
        else $is_publication_new = 0;
        
        $stmt = $db->prepare("UPDATE services SET is_publication = :is_publication WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':is_publication', $is_publication_new);
        $stmt->execute();
        
        return true;
    }
    
}
