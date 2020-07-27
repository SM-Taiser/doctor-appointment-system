<?php
namespace App\Admin;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;


class Admin extends DB{
    public $table="admin";
    public $firstName="";
    public $lastName="";
    public $admin_email="";
    public $phone="";
    public $address="";
    public $password="";
    public $id="";
    public $email_verified ="";

    public function __construct(){
        parent::__construct();
    }

    public function prepare($data=array()){
        if(array_key_exists('first_name',$data)){
            $this->firstName=$data['first_name'];
        }
        if(array_key_exists('last_name',$data)){
            $this->lastName=$data['last_name'];
        }
        if(array_key_exists('admin_email',$data)){
            $this->admin_email=$data['admin_email'];
        }
        if(array_key_exists('phone',$data)){
            $this->phone=$data['phone'];
        }
        if(array_key_exists('address',$data)){
            $this->address=$data['address'];
        }
        if(array_key_exists('password',$data)){
            $this->password=md5($data['password']);
        }
        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }

        if(array_key_exists('email_verified ',$data)){
            $this->email_verified =$data['email_verified '];
        }


        return $this;
    }





    public function store() {

        $query="INSERT INTO `doctor-information`.`admin` (`first_name`, `last_name`, `admin_email`, `password`, `phone`, `address`,`email_verified`) 
VALUES (:firstName, :lastName, :admin_email, :password,:phone, :address, :email_verified )";

        $result=$this->conn->prepare($query);
        var_dump($result);

        $result->execute(array(':firstName'=>$this->firstName,':lastName'=>$this->lastName,':admin_email'=>$this->admin_email,':password'=>$this->password,
':phone'=>$this->phone,':address'=>$this->address,':email_verified '=>$this->email_verified ));
        var_dump($result);
        
        if ($result) {
            Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> 
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
       } else {
            Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Failed!</strong> Data has not been stored successfully.
                </div>");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function change_password(){
        $query="UPDATE `doctor-information`.`admin` SET `password`=:password  WHERE `admin`.`admin_email` =:admin_email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':password'=>$this->password,':admin_email'=>$this->admin_email));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Password has been updated  successfully.
              </div>");
           // Utility::redirect('../../../../views/SEIPXXXX/User/Profile/signup.php');
        }
        else {
            echo "Error";
        }

    }

    public function view(){
        $query="SELECT * FROM `admin` WHERE `admin`.`admin_email` =:admin_email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':admin_email'=>$this->admin_email));
        $row=$result->fetch(PDO::FETCH_OBJ);
        return $row;
    }// end of view()


    public function profile_view(){
        $query="SELECT * FROM `admin` WHERE `admin`.`admin_email` =:admin_email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':admin_email'=>$this->admin_email));
        $row=$result->fetch(PDO::FETCH_OBJ);
        return $row;
    }// e

    
    public function validTokenUpdate(){
        $query="UPDATE `doctor-information`.`admin` SET  `email_verified`='".'Yes'."' WHERE `admin`.`admin_email` =:admin_email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':admin_email'=>$this->admin_email));

        if($result){
            Message::message("
             <div class=\"alert alert-success\">
             <strong>Success!</strong> Email verification has been successful. Please login now!
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect('../../../../views/SEIPXXXX/User/Profile/signup.php');
    }

    public function update(){

        $query="UPDATE `doctor-information`.`admin` SET `first_name`=:firstName, `last_name` =:lastName ,  `admin_email` =:admin_email, `phone` = :phone,
 `address` = :address  WHERE `admin`.`admin_email` = :admin_email";

        $result=$this->conn->prepare($query);

        $result->execute(array(':firstName'=>$this->firstName,':lastName'=>$this->lastName,':admin_email'=>$this->admin_email,':phone'=>$this->phone,
 ':address'=>$this->address,':email_verified '=>$this->email_verified ));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect($_SERVER['HTTP_REFERER']);
    }

}

