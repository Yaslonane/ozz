<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author andrey
 */
class UserController {
    //put your code here
    
    public function actionRegister(){
        
        $name = '';
        $email = '';
        $password = '';
        $result = false;
            
        if(isset($_POST['submit'])){
            
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $errors = false;
            
            if(!User::checkName($name)){
                $errors[] = 'Warning!!! It\'s name short 2 elements';
            }
            
            if(!User::checkPassword($password)){
                $errors[] = 'Warning!!! It\'s password short 6 elements';
            }
            
            if(!User::checkEmail($email)){
                $errors[] = 'Warning!!! It\'s e-mail dont valid';
            }
            
            if(User::checkEmailExists($email)){
                $errors[] = 'Sorry, this is e-mail is using';
            }
            
            if($errors == false){
                $result = (User::register($name, $password, $email));
            }
            
        }
        
        
        require_once (ROOT. TMPL. 'register.php');
        
        return true;
    }
    
    public function actionLogin(){
        
        $email = '';
        $password = '';
        
        var_dump($_SESSION);
        
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $errors = false;
            
            // valid data login and password
            if(!User::checkEmail($email)){
                $errors[] = 'Неверный e-mail '. $email;
            }
            if(!User::checkPassword($password)){
                $errors[] = 'Пароль не должен быть короче 6 символов';
            }
            
            //check exist user
            $userId = User::checkUserData($email, $password);
            
            if($userId == false){
                $errors[] = 'Uncorrect login and/or password';
            }
            else {
                User::auth($userId);
                
                header("Location: /adminpanel");
            }
        }
        require_once (ROOT . ADM_TMPL . 'login.php');
        
        return true;
    }
    
    public function actionLogout(){
        
        session_start();
        unset($_SESSION['user']);
        
        header("location: /");
    }
    
}
