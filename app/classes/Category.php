<?php


namespace App\classes;
use App\classes\Database;

class Category
{
    public function addCategory($data){
        $category_name = $data['category_name'];
        $status = $data['status'];

        $sql = "INSERT INTO `categories`(`category_name`, `status`) VALUES ('$category_name','$status')";
        $result = mysqli_query(Database::databaseConnection(),$sql);
        if ($result){
            $insertMsg = "Category successfully saved.";
            return $insertMsg;
        } else{
            $insertMsg = "Somthing error found, Please try again.";
            return $insertMsg;
        }
    }
    public function allCategory(){
        $result =  mysqli_query(Database::databaseConnection(),"SELECT * FROM `categories`");
        return $result;
    }
    public function active($id){
       $result =  mysqli_query(Database::databaseConnection(),"UPDATE `categories` SET `status`=1 WHERE `id` = '$id'");
       return $result;
    }

    public function inActive($id){
        $result =  mysqli_query(Database::databaseConnection(),"UPDATE `categories` SET `status`=0 WHERE `id` = '$id'");
        return $result;
    }
}