<?php
namespace App\Doctor;
if(!isset($_SESSION) )  session_start();
use App\model\Database as DB;
use PDO;

class Auth extends DB{

    public $email = "";
    public $password = "";

    public function __construct(){
        parent::__construct();
    }

    public function prepare($data = Array()){
        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = md5($data['password']);
        }
        return $this;
    }

    public function is_exist(){

        $query="SELECT * FROM `doctors` WHERE `doctors`.`email` =:email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':email'=>$this->email));

        $count = $result->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function is_registered(){
        $query = "SELECT * FROM `doctors` WHERE `confirm`=1 AND `email_verified`='" . 'Yes' . "' AND `email`=:email AND `password`=:password";
        $result=$this->conn->prepare($query);
        $result->execute(array(':email'=>$this->email, ':password'=>$this->password));

        $count = $result->rowCount();
        if ($count > 0) {

            //Getting Patient ID
            $query="SELECT * FROM `doctors` WHERE `doctors`.`email` =:email";
            $result=$this->conn->prepare($query);
            $result->execute(array(':email'=>$this->email));
            $row = $result->fetch(PDO::FETCH_OBJ);
            $_SESSION['dr_id']= $row->id;

            //Getting Patient ID


            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function logged_in(){
        if ((array_key_exists('email', $_SESSION)) && (!empty($_SESSION['email']))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function log_out(){
        $_SESSION['email']="";
        return TRUE;
    }
}

