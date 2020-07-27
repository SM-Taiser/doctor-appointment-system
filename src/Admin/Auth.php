<?php
namespace App\Admin;
if(!isset($_SESSION) )  session_start();
use App\model\Database as DB;

class Auth extends DB{

    public $admin_email = "";
    public $password = "";

    public function __construct(){
        parent::__construct();
    }

    public function prepare($data = Array()){
        if (array_key_exists('admin_email', $data)) {
            $this->admin_email = $data['admin_email'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = md5($data['password']);
        }
        return $this;
    }

    public function is_exist(){

        $query="SELECT * FROM `admin` WHERE `admin`.`admin_email` =:admin_email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':admin_email'=>$this->admin_email));

        $count = $result->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function is_registered(){
        $query = "SELECT * FROM `admin` WHERE `email_verified`='" . 'Yes' . "' AND `admin_email`=:admin_email AND `password`=:password";
        $result=$this->conn->prepare($query);
        $result->execute(array(':admin_email'=>$this->admin_email, ':password'=>$this->password));

        $count = $result->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function logged_in(){
        if ((array_key_exists('admin_email', $_SESSION)) && (!empty($_SESSION['admin_email']))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function log_out(){
        $_SESSION['admin_email']="";
        return TRUE;
    }
}

