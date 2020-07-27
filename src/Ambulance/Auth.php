<?php
namespace App\Ambulance;
if(!isset($_SESSION) )  session_start();
use App\Model\Database as DB;
use PDO;

class Auth extends DB{

    public $ambulance_email = "";
    public $password = "";

    public function __construct(){
        parent::__construct();
    }

    public function prepare($data = Array()){
        if (array_key_exists('ambulance_email', $data)) {
            $this->ambulance_email = $data['ambulance_email'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = md5($data['password']);
        }
        return $this;
    }

    public function is_exist(){

        $query="SELECT * FROM `ambulance` WHERE `ambulance`.`ambulance_email` =:ambulance_email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':ambulance_email'=>$this->ambulance_email));

        $count = $result->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function is_registered(){
        $query = "SELECT * FROM `ambulance` WHERE `email_verified`='" . 'Yes' . "' AND `ambulance_email`=:ambulance_email AND `password`=:password";
        $result=$this->conn->prepare($query);
        $result->execute(array(':ambulance_email'=>$this->ambulance_email, ':password'=>$this->password));

        $count = $result->rowCount();
        if ($count > 0) {


            //Getting driver ID
            $query="SELECT * FROM `ambulance` WHERE `ambulance`.`ambulance_email` =:ambulance_email";
            $result=$this->conn->prepare($query);
            $result->execute(array(':ambulance_email'=>$this->ambulance_email));
            $row = $result->fetch(PDO::FETCH_OBJ);
            $_SESSION['amb_comp_id']= $row->amb_comp_id;

            //Getting driver ID

            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function logged_in(){
        if ((array_key_exists('ambulance_email', $_SESSION)) && (!empty($_SESSION['ambulance_email']))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function log_out(){
        $_SESSION['ambulance_email']="";
        return TRUE;
    }
}

