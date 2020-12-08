<?php

namespace App\classes;
use App\classes\Database;


class Login{

    public function loginCheck($data){

        $username = $data['username'];
        $password = $data['password'];

        $sql = "SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password' ";

        $result = mysqli_query(Database::databaseConnection(),$sql);

        if ($result) {

           if (mysqli_num_rows($result) == 1){

                $row = mysqli_fetch_assoc($result); // only one row thats why we can not use while loop 
                
                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];

                header('location:index.php');
           }else{
               $logError = 'Username or password invalid.';
               return $logError;
           }
        }else{
            die();
        }
    }
}