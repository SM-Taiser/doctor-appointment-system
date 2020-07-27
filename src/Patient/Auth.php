<?php
namespace App\Patient;
if(!isset($_SESSION) )  session_start();
use App\model\Database as DB;
use PDO;
use App\PatientsInfo\PatientsInfo;
$obj=new PatientsInfo();
$obj->prepare($_POST);

class Auth extends DB{

    public $patient_email = "";
    public $password = "";

    public function __construct(){
        parent::__construct();
    }

    public function prepare($data = Array()){
        if (array_key_exists('patient_email', $data)) {
            $this->patient_email = $data['patient_email'];
        }
        if (array_key_exists('password', $data)) {
            $this->password = md5($data['password']);
        }
        return $this;
    }

    public function is_exist(){

        $query="SELECT * FROM `patient` WHERE `patient`.`patient_email` =:patient_email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':patient_email'=>$this->patient_email));

        $count = $result->rowCount();
        if ($count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function is_registered(){
        $query = "SELECT * FROM `patient` WHERE `email_verified`='" . 'Yes' . "' AND `patient_email`=:patient_email AND `password`=:password";
        $result=$this->conn->prepare($query);
        $result->execute(array(':patient_email'=>$this->patient_email, ':password'=>$this->password));

        $count = $result->rowCount();
        if ($count > 0) {

            //Getting doctors ID
            $query="SELECT * FROM `patient` WHERE `patient`.`patient_email` =:patient_email";
            $result=$this->conn->prepare($query);
            $result->execute(array(':patient_email'=>$this->patient_email));
            $row = $result->fetch(PDO::FETCH_OBJ);
            $_SESSION['id']= $row->id;

            //Getting doctors ID

            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function logged_in(){
        if ((array_key_exists('patient_email', $_SESSION)) && (!empty($_SESSION['patient_email']))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function log_out(){
        $_SESSION['patient_email']="";
        return TRUE;
    }
}

