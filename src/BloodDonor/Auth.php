<?php
namespace App\BloodDonor;
if(!isset($_SESSION) )  session_start();
use App\Model\Database as DB;

class Auth extends DB{

    public $donor_email = "";
    public $password = "";

    public function __construct(){
        parent::__construct();
    }

    public function prepare($data = Array()){
        if (array_key_exists('donor_email', $data)) {
            $this->donor_email = $data['donor_email'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = md5($data['password']);
        }
        return $this;
    }

    public function is_exist(){

        $query="SELECT * FROM `blood_donor` WHERE `blood_donor`.`donor_email` =:donor_email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':donor_email'=>$this->donor_email));

        $count = $result->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function is_registered(){
        $query = "SELECT * FROM `blood_donor` WHERE `email_verified`='" . 'Yes' . "' AND `donor_email`=:donor_email AND `password`=:password";
        $result=$this->conn->prepare($query);
        $result->execute(array(':donor_email'=>$this->donor_email, ':password'=>$this->password));

        $count = $result->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function logged_in(){
        if ((array_key_exists('donor_email', $_SESSION)) && (!empty($_SESSION['donor_email']))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function log_out(){
        $_SESSION['donor_email']="";
        return TRUE;
    }
}

