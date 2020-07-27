<?php
namespace App\PatientsInfo;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;


class PatientsInfo extends DB{
    public $table="patient";
    public $p_id="";
    public $id="";
    public $description="";
    public $file="";

    public function __construct(){
        parent::__construct();
    }

    public function prepare($data=array()){
        if(array_key_exists('p_id',$data)){
            $this->p_id=$data['p_id'];
        }

        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }

        if(array_key_exists('description',$data)){
            $this->description=$data['description'];
        }

        if(array_key_exists('file',$data)){
            $this->file=$data['file'];
        }



        return $this;
    }





    public function store() {

        $query="INSERT INTO `doctor-information`.`patients_info` (`file`,`id`,`description`) 
VALUES (:file,:id,:description)";

        $result=$this->conn->prepare($query);

        $result->execute(array(':file'=>$this->file,':id'=>$this->id,':description'=>$this->description));

        if ($result) {
            Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Your file has been uploaded successfully.
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


    public function index($mode="ASSOC")
    {
        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT p_id,file,description from patients_info WHERE id=".$_SESSION['id']);

        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $STH->fetchAll();
        //Utility::dd($allData);
        return $allData;
    }


    public function view_patient_info($mode="ASSOC")
    {
        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT p_id,file,description from patients_info WHERE id=".$_GET['patient_id']);

        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $STH->fetchAll();
        //Utility::dd($allData);
        return $allData;
    }






    public function update(){

        $query="UPDATE `doctor-information`.`patient` SET `name`=:name,`phone` =:phone,
 `address` = :address  WHERE `patient`.`email` = :email";

        $result=$this->conn->prepare($query);

        $result->execute(array(':name'=>$this->name,':email'=>$this->email,':phone'=>$this->phone,
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

        $query="UPDATE `doctor-information`.`patient` SET `name`=:name,`email` =:email, `phone` = :phone,
 `address` = :address  WHERE `patient`.`email` = :email";

        $result=$this->conn->prepare($query);

        $result->execute(array(':name'=>$this->name,':email'=>$this->email,':phone'=>$this->phone,
            ':address'=>$this->address,':email_token'=>$this->email_verified));

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

        $sqlQuery = "DELETE from `patients_info` WHERE p_id =$this->p_id";

        $result = $this->conn->exec($sqlQuery);

    // Utility::dd($$result);

        if($result){
            Message::message("Success! Data has been deleted Successfully!");
        }
        else{
            Message::message("Error! Data has not been deleted.");

        }



    }// end of delete()





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
        $sql = "SELECT * FROM `patients_info` WHERE  LIMIT $start ,$ItemsPerPage";
        $STH = $this->conn->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $arrAllData = $STH->fetchAll();
        //Utility::dd($arrAllData);
        return $arrAllData;
    }


}

