<?php

/**
 * Created on 04.10.2016
 * By NetBeans IDE 8.1
 * Author: Andrey Zashchepkin 
 *
 * 
 * ******** Contacts:*********
 * my e-mails - yaslonane@yandex.ru
 *            - andrey@zashchepkin.ru
 *            - info@zashchepkin.ru
 *  my site     zashchepkin.ru 
 * ********  end contacts *********
 * 
 *
 * Copyright zashchepkin.ru © 2016. All Rights Reserved.
 * License https://opensource.org/licenses/mit-license.php MIT License (MIT)
 *
 *
 * Description of Printer
 *
 * @author andrey
 * */
class Printer {
    //put your code here
    
    public static function getListPrinters(){
        
        $db = Db::getConnection();
        
        /*$name = "";
        $unit = "";
        $floor = "";
        $department = "";
        $cartrige = "";
        $status = "";*/
        
        if(isset($_POST['submit']) && (isset($_POST['name']) || isset($_POST['unit']) || isset($_POST['floor']) || isset($_POST['department']) || isset($_POST['cartrige']) || isset($_POST['status']))){
            
            $sql = "SELECT * FROM print WHERE ";
            
            if(!empty($_POST['name'])) {
                $name = $_POST['name'];
                $sql .= "name LIKE '%$name%', ";
            }
            
            if(!empty($_POST['unit'])) {
                $unit = $_POST['unit'];
                $sql .= "unit = '$unit', ";
            }
            
            if(!empty($_POST['floor'])) {
                $floor = $_POST['floor'];
                $sql .= "floor = $floor, ";
            }
            
            if(!empty($_POST['department'])) {
                $department = $_POST['department'];
                $sql .= "department = $department, ";
            }
            
            if(!empty($_POST['cartrige'])) {
                $cartrige = $_POST['cartrige'];
                $sql .= "cartrige = $cartrige, ";
            }
            
            if(!empty($_POST['status'])) {
                $status = $_POST['status'];
            $sql .= "status = $status, ";
            }
            
            
            $sql = substr($sql, 0, -2);
            $sql .= ";";
                                                                                //echo $sql;
            $result = $db->query($sql);
            if($result == false) return 0;
            $result->setFetchMode(PDO::FETCH_ASSOC);
            //$row = $result->fetch();
            
            //if($result->fetch() == false) $print = 0;

            $i = 0;
            while($row = $result->fetch()){
                $print[$i]['id'] = $row['id'];  
                $print[$i]['name'] = $row['name'];  
                $print[$i]['model'] = $row['model'];  
                $print[$i]['unit'] = $row['unit']; 
                $print[$i]['floor'] = $row['floor']; 
                $print[$i]['department'] = $row['department']; 
                $print[$i]['img'] = $row['img']; 
                $i++;
            }
            
           return $print;
            
            
        }else {
            
            $result = $db->query('SELECT * FROM print WHERE status = 1');
            $result->setFetchMode(PDO::FETCH_ASSOC);
            //$row = $result->fetch();
            
            //if($result->fetch() == false) $print = 0;

            $i = 0;
            while($row = $result->fetch()){
                $print[$i]['id'] = $row['id'];  
                $print[$i]['name'] = $row['name'];  
                $print[$i]['model'] = $row['model'];  
                $print[$i]['unit'] = $row['unit']; 
                $print[$i]['floor'] = $row['floor']; 
                $print[$i]['department'] = $row['department']; 
                $print[$i]['img'] = $row['img']; 
                $i++;
            }
            
           return $print;
        }
        
        
    }
    
    public static function getAllFloors(){
        
        return self::getAllValuesInTable('*', 'floor');
        
    }
    
    public static function getAllDepartments(){
        
        return self::getAllValuesInTable(array('id', 'name'), 'departments', $where = 'action', $where_value = '1');
        
    }
    
    public static function getAllCartriges(){
        
        return self::getAllValuesInTable(array('id', 'name'), 'cartriges', $where = 'action', $where_value = '1');
        
    }
    
    public static function getAllStatuses(){
        
         return self::getAllValuesInTable('*', 'status');
    }
    
    private static function getAllValuesInTable($columns, $table, $where = false, $where_value = false){
        
        $db = Db::getConnection();
        
        $sql = "SELECT ";
        
        if(is_array($columns)) $columns = implode(",", $columns);
        
        $sql .= "$columns FROM $table";
        
        if($where != false) {
            
            $sql .= " WHERE $where=$where_value";
        }
        
        $sql .= ";";
        
        $result = $db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            //$row = $result->fetch();
            
            //if($result->fetch() == false) $print = 0;

            $i = 0;
            while($row = $result->fetch()){
                $arr[$i]['id'] = $row['id'];
                $arr[$i]['name'] = $row['name'];
                $i++;
            }
            
           return $arr;
    }
}
