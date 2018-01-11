<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gallery
 *
 * @author andrey
 */
class Gallery {
    //put your code here
    
    public static function getAllAlbums($role = 'user'){ //получаем опубликованные альбомы $role = 'user' \ все альбомы $role = 'admin'
        
        $db = Db::getConnection(); //инициализируем подключение к бд
        
        $galleryList = array(); //инициализируем переменную 
        
        $sql = "SELECT * FROM album_gallery";
        
        if($role == 'user') $sql .= " WHERE is_publication = 1";
        
        $result = $db->query($sql); // получаем из базы список
        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $i = 0;
        while($row = $result->fetch()){
            foreach($row as $key => $value) { //перебираем массив полученный из бд и формируем массив для вывода на страницу сайта
                $galleryList[$i][$key] = $value;
            }
            $i++;
        }
        return $galleryList; //возвращаем массив
    }
    
    public static function getAlbumById($id_album){
        
        $db = Db::getConnection(); //инициализируем подключение к бд
        
        $album = array();
        
        $sql = "SELECT id, name, description, autor, is_publication FROM album_gallery WHERE id =".$id_album;
        
        $result = $db->query($sql); // получаем из базы список
        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $album = $result->fetch();
        
        $album['imgs'] = array();
        
        $result = $db->query('SELECT link, description FROM gallery WHERE id_album ='.$id_album.';'); // получаем из базы список
        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $i = 0;
        while($row = $result->fetch()){
                $album['imgs'][$i]['link'] = $row['link'];
                $album['imgs'][$i]['description'] = $row['description'];
            $i++;
        }
        
        return $album;
        
    }
    
    public static function saveAlbum(){
        
        $db = Db::getConnection();
        
        $id = $_POST['id_album'];
        $name = $_POST['name'];
        $is_publication = $_POST['is_publication'];
        $description = $_POST['description'];
        $autor = $_POST['autor'];


        
        $stmt = $db->prepare("UPDATE album_gallery set name = :name, is_publication = :is_publication, description=:description, autor=:autor WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':is_publication', $is_publication);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':autor', $autor);
        $stmt->execute();
        
       /* if($stmt->rowCount() > 0) return "Запись обновлена";
        else return "error!!!";*/
        
        $imgs = $db->prepare("DELETE FROM gallery WHERE id_album = :id_album");
        $imgs->bindParam(':id_album', $id);
        $imgs->execute();
        
        $desc_img = $_POST['description_url'];
        $link_img = $_POST['url'];
                
        for($i = 0; count($link_img) > $i; $i++){
            if(empty($link_img[$i])) continue;
            $stmt = $db->prepare("INSERT INTO gallery (id_album, description, link) VALUES (:id_album, :description, :link)");
            $stmt->bindParam(':id_album', $id);
            $stmt->bindParam(':description', $desc_img[$i]);
            $stmt->bindParam(':link', $link_img[$i]);
            $stmt->execute();
        }
        
        return true;
    }
    
    public static function createAlbum($name){
        
        $db = Db::getConnection();
        
        $stmt = $db->prepare("INSERT INTO album_gallery (name) VALUES (:name)");
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        
        return $db->lastInsertId();
    }
    
    public static function delAlbum($id){
        
        $db = Db::getConnection();
        
        $stmt = $db->prepare("DELETE FROM album_gallery WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return true;
    }
    
    public static function changeIsPublicAlbum($id){
        
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM album_gallery WHERE id='.$id);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        
        $is_publication = $row['is_publication'];
        
        if($is_publication == 0) {$is_publication_new = 1;}
        else {$is_publication_new = 0;}
        
        $stmt = $db->prepare("UPDATE album_gallery SET is_publication = :is_publication WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':is_publication', $is_publication_new);
        $stmt->execute();

        return true;
    }
    
    public static function getAlbumInImages(){
        
        $db = Db::getConnection(); //инициализируем подключение к бд
        
        $idsAlbum = array(); //инициализируем переменную 
        
        $sql = "SELECT id FROM album_gallery WHERE is_publication = 1";
        
        $result = $db->query($sql); // получаем из базы список
        
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $i = 0;
        while($row = $result->fetch()){
                $idsAlbum[$i] = $row['id'];
            $i++;
        }
        
        //return $idsAlbum;
        $albums = Array();
        
        for($i = 0; count($idsAlbum) > $i; $i++){
            $albums[$i] = self::getAlbumById($idsAlbum[$i]);
        }
        return $albums;
    }
}
