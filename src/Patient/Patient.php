<?php
namespace App\Patient;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;


class Patient extends DB{
    public $table="patient";
    public $name="";
    public $patient_email="";
    public $phone="";
    public $address="";
    public $password="";
    public $id="";
    public $email_verified="";

    public function __construct(){
        parent::__construct();
    }

    public function prepare($data=array()){
        if(array_key_exists('name',$data)){
            $this->name=$data['name'];
        }

        if(array_key_exists('patient_email',$data)){
            $this->patient_email=$data['patient_email'];
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

        if(array_key_exists('email_verified',$data)){
            $this->email_verified=$data['email_verified'];
        }


        return $this;
    }





    public function store() {

        $query="INSERT INTO `doctor-information`.`patient` (`name`, `patient_email`, `password`, `phone`, `address`,`email_verified`) 
VALUES (:name,:patient_email, :password,:phone, :address, :email_verified)";

        $result=$this->conn->prepare($query);

        $result->execute(array(':name'=>$this->name,':patient_email'=>$this->patient_email,':password'=>$this->password,
':phone'=>$this->phone,':address'=>$this->address,':email_verified'=>$this->email_verified));
        
        if ($result) {
            Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Your registration has been successfull.
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
        $query="UPDATE `doctor-information`.`patient` SET `password`=:password  WHERE `admin`.`patient_email` =:patient_email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':password'=>$this->password,':patient_email'=>$this->patient_email));

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
    public function index($mode="ASSOC")
    {
        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT * from patient where is_active='Yes' ");

        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $STH->fetchAll();
        //Utility::dd($allData);
        return $allData;
    }



    public function index_trash($mode="ASSOC"){
        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT * from patient where is_active='No' ");

        if($mode=="OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();

        return $arrAllData;

    }
    public function view($fetchMode="ASSOC"){

        $STH = $this->conn->query("SELECT * from patient where id='$this->id'");
        // Utility::dd($STH);
        $STH->setFetchMode(PDO::FETCH_OBJ);


        $singleUser  = $STH->fetch();
        return $singleUser;

    }// end of view()


    public function aview($fetchMode="ASSOC"){

        $STH = $this->conn->query("SELECT * from patient where id=".$_SESSION['id']);
        // Utility::dd($STH);
        $STH->setFetchMode(PDO::FETCH_OBJ);


        $singleUser  = $STH->fetch();
        return $singleUser;

    }// end of view()

    public function count_patient($fetchMode="ASSOC"){

        $STH = $this->conn->query("SELECT COUNT(id) AS id FROM patient");
        // Utility::dd($STH);
        $STH->setFetchMode(PDO::FETCH_OBJ);


        $singleUser  = $STH->fetch();
        return $singleUser;

    }// end of view()

    public function view_patient($fetchMode="ASSOC"){

        $STH = $this->conn->query("SELECT * from patient where id=".$_GET['patient_id']);
        // Utility::dd($STH);
        $STH->setFetchMode(PDO::FETCH_OBJ);


        $singleUser  = $STH->fetch();
        return $singleUser;

    }// end of view()


    public function profile_view(){
        $query="SELECT * FROM `patient` WHERE `patient`.`patient_email` =:patient_email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':patient_email'=>$this->patient_email));
        $row=$result->fetch(PDO::FETCH_OBJ);
        return $row;
    }

    
    public function validTokenUpdate(){
        $query="UPDATE `doctor-information`.`patient` SET  `email_verified`='".'Yes'."' WHERE `patient`.`patient_email` =:patient_email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':patient_email'=>$this->patient_email));

        if($result){
            Message::message("
             <div class=\"alert alert-success\">
             <strong>Success!</strong> Email verification has been successful. Please login now!
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect('../../../Profile/signup.php');
    }

    public function update(){

        $query="UPDATE `doctor-information`.`patient` SET `name`=:name,`phone` =:phone,
 `address` = :address  WHERE `patient`.`patient_email` = :patient_email";

        $result=$this->conn->prepare($query);

        $result->execute(array(':name'=>$this->name,':patient_email'=>$this->patient_email,':phone'=>$this->phone,
 ':address'=>$this->address));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect('patient-profile.php');
    }

    public function updates(){

        $query="UPDATE `doctor-information`.`patient` SET `name`=:name,`patient_email` =:patient_email, `phone` = :phone,
 `address` = :address  WHERE `patient`.`patient_email` = :patient_email";

        $result=$this->conn->prepare($query);

        $result->execute(array(':name'=>$this->name,':patient_email'=>$this->patient_email,':phone'=>$this->phone,
            ':address'=>$this->address,':email_verified'=>$this->email_verified));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect('manage-patient.php');
    }



    public function delete(){




        $sqlQuery = "DELETE from `patient` WHERE id = $this->id;";

        $result = $this->conn->exec($sqlQuery);


        if($result){
            Message::message("Success! Data has been deleted Successfully!");
        }
        else{
            Message::message("Error! Data has not been deleted.");

        }



    }// end of delete()

    public function is_delete(){


        $sql = "UPDATE `patient`  SET is_active='No' where id =".$this->id;

        $STH = $this->conn->prepare($sql);


        $result = $STH->execute();

        if($result)
            Message::message("<div  id='message'><h3 align='center'> Success! Data Has Been Trashed Successfully!</h3></div>");
        else
            Message::message("<div id='message'><h3 align='center'> Failed! Data Has Not Been Trashed Successfully!</h3></div>");

        Utility::redirect('manage-patient.php');



    }// end of is_delete



    public function recoverDoc()
    {

        $sqlQuery = " UPDATE  `patient` SET is_active ='YES' WHERE id = $this->id;";

        $result = $this->conn->exec($sqlQuery);

        if ($result) {
            Message::message("Success! Data has been recovered Successfully!");
        } else {
            Message::message("Error! Data has not been recovered.");

        }
    }



    public function indexPaginator($page=1,$ItemsPerPage=3){
        $start = ($page-1)*$ItemsPerPage;
        $sql = "SELECT * FROM `patient` WHERE `is_active`='YES' LIMIT $start ,$ItemsPerPage";
       // var_dump($sql);
        $STH = $this->conn->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $arrAllData = $STH->fetchAll();
        //Utility::dd($arrAllData);
        return $arrAllData;
    }


}

