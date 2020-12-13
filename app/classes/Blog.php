<?php


namespace App\classes;
use App\classes\Database;


class Blog
{
    public function addBlog($data){
        $file_name = $_FILES['photo']['name'];
        $file_extention = explode('.',$file_name);
        $file_extention =  end($file_extention);
        $photo = date('Ymdhis.').$file_extention;
        $category_id = mysqli_real_escape_string(Database::databaseConnection(),$data['category_id']);
        $title =  mysqli_real_escape_string(Database::databaseConnection(),$data['title']) ;
        $content = mysqli_real_escape_string(Database::databaseConnection(),$data['content']);
        $status = $data['status'];
        $name = $_SESSION['name'];

        $sql = "INSERT INTO `blogs`(`category_id`, `title`, `content`, `photo`, `name`, `status`) VALUES ('$category_id','$title','$content','$photo','$name','$status')";
        $result = mysqli_query(Database::databaseConnection(),$sql);
        if ($result){
            move_uploaded_file($_FILES['photo']['tmp_name'],'../uploads/'.$photo);
            $insertMsg = "Blog successfully saved.";
            return $insertMsg;
        } else{
            $insertMsg = "Somthing error found, Please try again.";
            return $insertMsg;
        }
    }

    public function updateBlog($data){

//    print_r($data);
//    exit();
        $category_id = mysqli_real_escape_string(Database::databaseConnection(),$data['category_id']);
        $title =  mysqli_real_escape_string(Database::databaseConnection(),$data['title']) ;
        $content = mysqli_real_escape_string(Database::databaseConnection(),$data['content']);
        $status = $data['status'];
        $name = $_SESSION['name'];
        $id = $_POST['id'];

        if ( $_FILES['photo']['name'] == null){
            $sql = "UPDATE `blogs` SET `category_id` = '$category_id', `title`  = '$title', `content`  = '$content', `name`  = '$name', `status`  = '$status'  WHERE `id` = '$id'";
        }else{
            $file_name = $_FILES['photo']['name'];
            $file_extention = explode('.',$file_name);
            $file_extention =  end($file_extention);
            $photo = date('Ymdhis.').$file_extention;
            $sql = "UPDATE `blogs` SET `category_id` = '$category_id', `title`  = '$title', `content`  = '$content', `photo`  = '$photo', `name`  = '$name', `status`  = '$status'  WHERE `id` = '$id'";
            move_uploaded_file($_FILES['photo']['tmp_name'],'../uploads/'.$photo);
        }
        $result = mysqli_query(Database::databaseConnection(),$sql);
        if ($result){
//            $insertMsg = "Category successfully updated.";
//            return $insertMsg;
            header('location:edit_blog.php?id='.$id);
        } else{
            header('location:edit_blog.php?id='.$id);
        }
    }

    public function allblog(){
        $result =  mysqli_query(Database::databaseConnection(),"SELECT `blogs`.*, `categories`.`category_name` FROM `blogs` INNER JOIN `categories` ON  `blogs`.`category_id`= `categories`.`id`ORDER BY `id` DESC");
        return $result;
    }
    public function selectRaw($id = ''){
        $result =  mysqli_query(Database::databaseConnection(),"SELECT * FROM `blogs` WHERE `id` = '$id'");
        return $result;
    }
    public function active($id){
        $result =  mysqli_query(Database::databaseConnection(),"UPDATE `blogs` SET `status`=1 WHERE `id` = '$id'");
        return $result;
    }

    public function inActive($id){
        $result =  mysqli_query(Database::databaseConnection(),"UPDATE `blogs` SET `status`=0 WHERE `id` = '$id'");
        return $result;
    }
    public function delete($id){
        $result =  mysqli_query(Database::databaseConnection(),"DELETE FROM `blogs` WHERE `id` = '$id'");
        return $result;
    }
}