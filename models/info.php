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
        
        $name_autor = $_POST['name_autor'];
        $email = $_POST['email'];
        $phones = $_POST['phones'];
        $site_name = $_POST['site_name'];
        $info_text = $_POST['info_text'];
        $meta_kw = $_POST['meta_kw'];
        $meta_d = $_POST['meta_d'];
        $logo = $_POST['logo'];
        $favicon = $_POST['favicon'];
        $vk_link = $_POST['vk_link'];
        $instagramm_link = $_POST['instagramm_link'];
        
        $total_clients = $_POST['total_clients'];
        $total_work_time = $_POST['total_work_time'];
        $total_good_fotos = $_POST['total_good_fotos'];
        $total_source_fotos = $_POST['total_source_fotos'];





        
        $stmt = $db->prepare("UPDATE info set name_autor = :name_autor, email = :email,"
                . "  phones = :phones, site_name = :site_name, info_text = :info_text, "
                . "total_clients=:total_clients, total_work_time=:total_work_time, total_good_fotos = :total_good_fotos, total_source_fotos = :total_source_fotos,  vk_link=:vk_link, instagramm_link=:instagramm_link, favicon = :favicon, meta_kw = :meta_kw, meta_d = :meta_d, logo = :logo");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phones', $phones);
        $stmt->bindParam(':name_autor', $name_autor);
        $stmt->bindParam(':vk_link', $vk_link);
        $stmt->bindParam(':site_name', $site_name);
        $stmt->bindParam(':favicon', $favicon);
        $stmt->bindParam(':info_text', $info_text);
        $stmt->bindParam(':meta_kw', $meta_kw);
        $stmt->bindParam(':meta_d', $meta_d);
        $stmt->bindParam(':logo', $logo);
        $stmt->bindParam(':instagramm_link', $instagramm_link);
        $stmt->bindParam(':total_clients', $total_clients);
        $stmt->bindParam(':total_work_time', $total_work_time);
        $stmt->bindParam(':total_good_fotos', $total_good_fotos);
        $stmt->bindParam(':total_source_fotos', $total_source_fotos);
        
        $stmt->execute();
        
        if($stmt->rowCount() > 0) return "Запись обновлена";
        else return "error!!!";

    }
}
