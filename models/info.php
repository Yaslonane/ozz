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
    
    public static function getSliders($all = false){
        $db = Db::getConnection();
        
        $sliders = array();
        
        $sql = "SELECT * FROM slider";
        
        if(!$all) $sql .= "  WHERE is_publication = 1";
        
        $sql .= ";";
        
        $result = $db->query($sql);
        
        $i = 0;
        while ($row = $result->fetch()){ //перебираем массив полученный из бд и формируем массив для вывода на страницу сайта
            foreach($row as $key => $value) { 
                $sliders[$i][$key] = $value;
            }
            $i++;
        }
        
        return $sliders; //возвращаем массив категорий
    }
    
    public static function getSlidersByID($id){
        $id = intval($id);
        
        if($id){
            $db = Db::getConnection();
            
            $result = $db->query('SELECT * FROM slider WHERE id='.$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row = $result->fetch();
            
            foreach($row as $key => $value) { 
                    $slider[$key] = $value;
                }
            
            return $slider;
        }
    }
    
    public static function updateSlider(){
        
        $db = Db::getConnection();
        
        $id = $_POST['id'];
        $title = $_POST['title'];
        $link = $_POST['link'];
        $is_publication = $_POST['is_publication'];
        $description = $_POST['description'];
        $img = $_POST['img'];

        
        $stmt = $db->prepare("UPDATE slider set title = :title, link = :link,  is_publication = :is_publication, description=:description, img = :img WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':is_publication', $is_publication);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':link', $link);
        $stmt->bindParam(':description', $description);
        
        $stmt->execute();
        
        if($stmt->rowCount() > 0) return "Запись обновлена";
        else return "error!!!";

    }
    public static function createSlider($name){
        
        $db = Db::getConnection();
        
        $stmt = $db->prepare("INSERT INTO slider (title) VALUES (:title)");
        $stmt->bindParam(':title', $name);
        $stmt->execute();
        
        return $db->lastInsertId();
    }
    
    public static function delSlider($id){
        
        $db = Db::getConnection();
        
        $stmt = $db->prepare("DELETE FROM slider WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return true;
    }
    
    public static function changeIsPublic($id){
        
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM slider WHERE id='.$id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        
        $is_publication = $row['is_publication'];
        
        if($is_publication == 0) $is_publication_new = 1;
        else $is_publication_new = 0;
        
        $stmt = $db->prepare("UPDATE slider SET is_publication = :is_publication WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':is_publication', $is_publication_new);
        $stmt->execute();
        
        return true;
    }
}
