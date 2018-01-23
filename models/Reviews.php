<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 07.04.16
 * Time: 15:14
 */

class Reviews{

    /*
     * Return single news item with specified id
     * @param integer $id
     */
    const SHOW_BY_DEFAULT = 3;
    /*
     * возвращаем массив продуктов
     */
    public static function getAllReviews($all = false){
        
        $db = Db::getConnection();
        
        $reviewsList = array();
        
        $sql = "SELECT * FROM reviews";
        
        if(!$all) $sql .= "  WHERE is_publication = 1";
        
        $sql .= ";";
        
        $result = $db->query($sql);
        
        $i = 0;
        while ($row = $result->fetch()){ //перебираем массив полученный из бд и формируем массив для вывода на страницу сайта
            foreach($row as $key => $value) { 
                $reviewsList[$i][$key] = $value;
            }
            $i++;
        }
        
        return $reviewsList; //возвращаем массив категорий
    }
    
    /*public static function getLatestReviews($count = self::SHOW_BY_DEFAULT){
        
        $count = intval($count);
        
        $db = Db::getConnection();
        
        $postsList = array();
        
        $result = $db->query('SELECT * FROM reviews WHERE is_publication = "1" ORDER BY id DESC LIMIT '.$count);
        
        $i = 0;
        while ($row = $result->fetch()){ //перебираем массив полученный из бд и формируем массив для вывода на страницу сайта
            foreach($row as $key => $value) { 
                $postsList[$i][$key] = $value;
            }
            $i++;
        }
        
        return $reviewsList; //возвращаем массив категорий
    }*/
    
    public static function getReviewById($id){
        
        $id = intval($id);
        
        if($id){
            $db = Db::getConnection();
            
            $result = $db->query('SELECT * FROM reviews WHERE id='.$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $row = $result->fetch();
            
            foreach($row as $key => $value) { 
                    $post[$key] = $value;
                }
            
            return $post;
        }
    }
    
     public static function updateReview(){
        
        $db = Db::getConnection();
        
        $id = $_POST['id'];
        $name = $_POST['name'];
        $date = self::changeDateToUnix($_POST['date']);
        $text = $_POST['text'];
        $img = $_POST['img'];
        $vk = $_POST['vk'];
        $odnoklassniki = $_POST['odnoklassniki'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $is_publication = $_POST['is_publication'];

        

        $stmt = $db->prepare("UPDATE reviews set name = :name, date = :date, text=:text, vk=:vk, odnoklassniki=:odnoklassniki, is_publication = :is_publication, email = :email, phone = :phone, img = :img WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':text', $text);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':vk', $vk);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':odnoklassniki', $odnoklassniki);
        $stmt->bindParam(':is_publication', $is_publication);
        
        $stmt->execute();
        
        if($stmt->rowCount() > 0) return "Запись обновлена";
        else return "error!!!";

    }
    
    public static function createReview($name){
        
        $db = Db::getConnection();
        
        $stmt = $db->prepare("INSERT INTO reviews (name) VALUES (:name)");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        
        return $db->lastInsertId();
    }
    
    
    public static function delReview($id){
        
        $db = Db::getConnection();
        
        $stmt = $db->prepare("DELETE FROM reviews WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return true;
    }
    
    public static function changeIsPublic($id){
        
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM reviews WHERE id='.$id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        
        $is_publication = $row['is_publication'];
        
        if($is_publication == 0) $is_publication_new = 1;
        else $is_publication_new = 0;
        
        $stmt = $db->prepare("UPDATE reviews SET is_publication = :is_publication WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':is_publication', $is_publication_new);
        $stmt->execute();
        
        return true;
    }
    
    /*public static function getTotalPostsInCategory($categoryId = false){
        $db = Db::getConnection();
        
        $sql = "SELECT count(id) AS count FROM blog WHERE is_publication = 1";
        
        if($categoryId) {
                $listIds  = self::getListPostsIdByCategory($categoryId);
                if(count($listIds)){
                    $listIds = implode(",", $listIds);
                    $sql .= " AND id IN (".$listIds . ")";
                }else $sql .= " AND id = 0";
            }
        
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        
        return $row['count'];
    }*/
    
    public static function changeDate($date){
        
        $translate = array(
            "am" => "дп",
            "pm" => "пп",
            "AM" => "ДП",
            "PM" => "ПП",
            "Monday" => "Понедельник",
            "Mon" => "Пн",
            "Tuesday" => "Вторник",
            "Tue" => "Вт",
            "Wednesday" => "Среда",
            "Wed" => "Ср",
            "Thursday" => "Четверг",
            "Thu" => "Чт",
            "Friday" => "Пятница",
            "Fri" => "Пт",
            "Saturday" => "Суббота",
            "Sat" => "Сб",
            "Sunday" => "Воскресенье",
            "Sun" => "Вс",
            "January" => "Января",
            "Jan" => "Янв",
            "February" => "Февраля",
            "Feb" => "Фев",
            "March" => "Марта",
            "Mar" => "Мар",
            "April" => "Апреля",
            "Apr" => "Апр",
            "May" => "Мая",
            "May" => "Мая",
            "June" => "Июня",
            "Jun" => "Июн",
            "July" => "Июля",
            "Jul" => "Июл",
            "August" => "Августа",
            "Aug" => "Авг",
            "September" => "Сентября",
            "Sep" => "Сен",
            "October" => "Октября",
            "Oct" => "Окт",
            "November" => "Ноября",
            "Nov" => "Ноя",
            "December" => "Декабря",
            "Dec" => "Дек",
            "st" => "ое",
            "nd" => "ое",
            "rd" => "е",
            "th" => "ое"
        );
        
        
        return strtr($date, $translate);
    }
    
    /*public static function getCategoryByIds($id_post){
        
        $id = intval($id_post);
        
        $db = Db::getConnection();
        
        $sql = "SELECT post_is_category.id_category, category.name
                FROM post_is_category
                LEFT JOIN category
                ON post_is_category.id_category = category.id
                WHERE post_is_category.id_post = ".$id ;
        
        $result = $db->query($sql);
        $categoryList = false;
        
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $i = 0;
                while ($row = $result->fetch()){
                    foreach($row as $key => $value) { 
                                $categoryList[$i][$key] = $value;
                            }
                    $i++;
                }

            return $categoryList;
        
    }*/
    
    /*public static function changeCatInPost($arr_cat_in_post, $id_cat){
        $arr = Array();
        for($i = 0; count($arr_cat_in_post) > $i; $i++){
            $arr[$i] = $arr_cat_in_post[$i]['id_category'];
        }
            if (in_array($id_cat, $arr)) {
            return true;
        }else return false;
    }
    
    public static function getPreviewPost($categoryId = false, $page =1){
        
        $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
            
            $db = Db::getConnection();
            $posts = array();
            $sql = "SELECT * FROM blog WHERE is_publication = 1";
            
            if($categoryId) {
                $listIds  = self::getListPostsIdByCategory($categoryId);
                if(count($listIds)){
                    $listIds = implode(",", $listIds);
                    $sql .= " AND id IN (".$listIds . ")";
                    $sql .= " ORDER BY id DESC LIMIT ".self::SHOW_BY_DEFAULT." OFFSET ".$offset;
                }else $sql .= " AND id = 0";
            }
            
            $result = $db->query($sql);
            
            $i = 0;
            while ($row = $result->fetch()){ //перебираем массив полученный из бд и формируем массив для вывода на страницу сайта
                
                $posts[$i]['id'] = $row['id'];
                $posts[$i]['name'] = $row['name'];
                $posts[$i]['img'] = $row['img'];
                $posts[$i]['text_mini'] = $row['text_mini'];
                $posts[$i]['date'] = $row['date'];
                $posts[$i]['autor'] = $row['autor'];
                $posts[$i]['category'] = self::getCategoryByIds($row['id']);

                $i++;
            }
            
            return $posts;
    }
    
    private static function getListPostsIdByCategory($categoryId){
        
        $db = Db::getConnection();
        
        $sql = "SELECT id_post FROM post_is_category WHERE id_category = ".$categoryId;
        
        $result = $db->query($sql);
        
        $ids = array();
        
        $i = 0;
            while ($row = $result->fetch()){ //перебираем массив полученный из бд и формируем массив для вывода на страницу сайта
                $ids[$i] = $row['id_post'];
                $i++;
            }
            
        return $ids;
    }
    
    public static function getListCategory($count = false){
        
        $db = Db::getConnection();
        
        $sql = "SELECT id, name  FROM category WHERE is_publication = 1";
        
        $result = $db->query($sql);
        
        $i = 0;
            while ($row = $result->fetch()){ //перебираем массив полученный из бд и формируем массив для вывода на страницу сайта
                $categoryList[$i]['id'] = $row['id'];
                $categoryList[$i]['name'] = $row['name'];
                if($count == true) {
                    $categoryList[$i]['count'] = self::getCountPostsInCategory($row['id']);
                }
                $i++;
            }
            
            return $categoryList;
    }*/
    
    /*public static function getListReviewsAdmin(){
        
        $db = Db::getConnection();
        
        $sql = "SELECT *  FROM review";
        
        $result = $db->query($sql);
        
         $i = 0;
        while($row = $result->fetch()){
            foreach($row as $key => $value) { //перебираем массив полученный из бд и формируем массив для вывода на страницу сайта
                $categoryList[$i][$key] = $value;
            }
            $i++;
        }
            
            return $reviewsList;
    }
    
    public static function getListCategoryByIdAdmin($id){
        
        $db = Db::getConnection();
        
        $sql = "SELECT *  FROM category WHERE id = ".$id;
        
        $result = $db->query($sql);
        
         $i = 0;
        while($row = $result->fetch()){
            foreach($row as $key => $value) { //перебираем массив полученный из бд и формируем массив для вывода на страницу сайта
                $category[$key] = $value;
            }
            $i++;
        }
            
            return $category;
    }
    
    private static function getCountPostsInCategory($id_category){
        
        $db = Db::getConnection();
        
        $sql = "SELECT count(id_post) as count  FROM post_is_category WHERE id_category = ".$id_category;
         
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        
        return $row['count'];
    }


    public static function getOnePostById($id){
        
        $db = Db::getConnection();
        
        $sql = "SELECT * FROM blog WHERE id = ". $id;
        
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        
        $row['category_id'] = self::getCategoryByIds($row['id']);
        
        return $row;
    }
    
    public static function getOnePostByIdAdmin($id){
        
        $db = Db::getConnection();
        
        $sql = "SELECT * FROM blog WHERE id = ". $id;
        
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        
        return $row;
    }
    
    public static function getAllPostsAdmin(){ //получаем все постов
        
        $db = Db::getConnection(); //инициализируем подключение к бд
        
        $servicesList = array(); //инициализируем переменную 
        
        $result = $db->query('SELECT * FROM blog'); // получаем из базы список
        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $i = 0;
        while($row = $result->fetch()){
            foreach($row as $key => $value) { //перебираем массив полученный из бд и формируем массив для вывода на страницу сайта
                $PostsList[$i][$key] = $value;
            }
            $i++;
        }
        return $PostsList; //возвращаем массив
    }*/
    
    private static function changeDateToUnix($date){
        
        $arr_date = explode("-", $date);
        $U_date = mktime(0,0,0,$arr_date[0],$arr_date[1],$arr_date[2]);
        
        return $U_date;
    }
        
   

}

?>