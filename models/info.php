<?php
/**
 * Description of info
 *
 * @author andrey
 */
class info {
    //put your code here
    public static function getInfo(){ //функция для получения массива общей информации из бд
        
        $db = Db::getConnection(); //инициализируем подключение к бд
        
        $info = array(); //инициализируем переменную 
        
        $result = $db->query('SELECT * FROM info'); // получаем из базы список
        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $row = $result->fetch();
        foreach ($row as $key => $value) { //перебираем массив полученный из бд и формируем массив для вывода на страницу сайта
            $info[$key] = $value;
        }
        
        return $info; //возвращаем массив
    }
    
    public static function getBrands($role = 'user'){
        
        $db = Db::getConnection(); //инициализируем подключение к бд
        
        $brandList = array(); //инициализируем переменную 
        
        $sql = "SELECT * FROM brands";
        
        if($role == 'user'){
            $sql .= " WHERE is_publication = 1";
        }
        
        $result = $db->query($sql); // получаем из базы список
        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $i = 0;
        while($row = $result->fetch()){
            foreach($row as $key => $value) { //перебираем массив полученный из бд и формируем массив для вывода на страницу сайта
                $brandList[$i][$key] = $value;
            }
            $i++;
        }
        
        return $brandList; //возвращаем массив
        
    }
    
    public static function updateInfo(){
        
        $db = Db::getConnection();
        
        $email = $_POST['email'];
        $phones = $_POST['phones'];
        $adress = $_POST['adress'];
        $work_time = $_POST['work_time'];
        $site_name = $_POST['site_name'];
        $text_mini = $_POST['info_text_mini'];
        $text = $_POST['info_text'];
        $meta_kw = $_POST['meta_kw'];
        $meta_d = $_POST['meta_d'];
        $logo = $_POST['logo'];

        
        $stmt = $db->prepare("UPDATE info set email = :email, phones = :phones,"
                . "  adress = :adress, work_time = :work_time, site_name = :site_name, "
                . "info_text_mini=:info_text_mini, info_text = :info_text, meta_kw = :meta_kw, meta_d = :meta_d, logo = :logo");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phones', $phones);
        $stmt->bindParam(':adress', $adress);
        $stmt->bindParam(':work_time', $work_time);
        $stmt->bindParam(':site_name', $site_name);
        $stmt->bindParam(':info_text_mini', $text_mini);
        $stmt->bindParam(':info_text', $text);
        $stmt->bindParam(':meta_kw', $meta_kw);
        $stmt->bindParam(':meta_d', $meta_d);
        $stmt->bindParam(':logo', $logo);
        
        $stmt->execute();
        
        if($stmt->rowCount() > 0) return "Запись обновлена";
        else return "error!!!";

    }
}
