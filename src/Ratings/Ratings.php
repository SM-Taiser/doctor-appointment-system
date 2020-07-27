<?php
namespace App\Ratings;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;


class Ratings extends DB{
    public $table="ratings";

    public $rating_id="";
    public $doctor_id="";
    public $patient_id="";
    public $rating="";


    public function __construct(){
        parent::__construct();
    }

    public function prepare($data=array()){
        if(array_key_exists('rating_id',$data)){
            $this->rating_id=$data['rating_id'];
        }

        if(array_key_exists('doctor_id',$data)){
            $this->doctor_id=$data['doctor_id'];
        }

        if(array_key_exists('patient_id',$data)){
            $this->patient_id=$data['patient_id'];
        }

        if(array_key_exists('rating',$data)){
            $this->rating=$data['rating'];
        }



        return $this;
    }





    public function store() {


        $query="INSERT INTO `doctor-information`.`ratings` (`doctor_id`,`patient_id`,`rating`) 
VALUES (:doctor_id,:patient_id,:rating)";

        $result=$this->conn->prepare($query);

        $result->execute(array(':doctor_id'=>$this->doctor_id,':patient_id'=>$this->patient_id,':rating'=>$this->rating));
        //var_dump($result);
        if ($result) {
            Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Data has been stored successfully, Please check your email and active your account.
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
        $STH = $this->conn->query("SELECT ratings.rating_id, ratings.doctor_id,ratings.schedule_id ,ratings.patient_id,ratings.rating,appointment_schedule.is_read from ratings inner JOIN appointment_schedule WHERE appointment_schedule.schedule_id=ratings.schedule_id ");

        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $STH->fetchAll();

        return $allData;
    }

    public function get_all_ratings($mode="ASSOC")
    {
        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT ratings.rating_id, ratings.doctor_id,ratings.rating,doctors.name as doctorName,patient.name as patientName from ratings inner JOIN doctors INNER JOIN patient WHERE doctors.id=ratings.doctor_id AND patient.id=ratings.patient_id");

        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $STH->fetchAll();

        return $allData;
    }

    public function getAppScheduleData($mode="ASSOC")
    {
        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT * from appointment_schedule WHERE is_read = '1' ");

        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allDataOfAppSchedule = $STH->fetchAll();

        return $allDataOfAppSchedule;
    }

    public function getRatingsData($mode="ASSOC")
    {
        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT * from ratings ");

        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allDataOfRatngs = $STH->fetchAll();

        return $allDataOfRatngs;
    }

    public function view($fetchMode="ASSOC"){

        $STH = $this->conn->query('SELECT * from rating');

        $STH->setFetchMode(PDO::FETCH_OBJ);

        // Utility::dd($STH);
        $singleUser  = $STH->fetch();
        return $singleUser;

    }// end of view()





    public function update(){

        $query="UPDATE `doctor-information`.`chambers` SET `patient_id` =:patient_id,
 `rating` = :rating  WHERE `chambers`.`rating_id` = ".$this->rating_id;

        $result=$this->conn->prepare($query);
        // Utility::dd($result);

        $result->execute(array(':patient_id'=>$this->patient_id,':rating'=>$this->rating));
        //  Utility::dd($result);

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
            //echo "suc";
        }
        else {
            echo "Error";
        }
        return Utility::redirect('doctor-profile.php');
    }

    public function updates(){

        $query="UPDATE `doctor-information`.`chambers` SET `patient_id` =:patient_id,
 `rating` = :rating  WHERE `chambers`.`email` = :email";

        $result=$this->conn->prepare($query);

        $result->execute(array(':id'=>$this->id,':patient_id'=>$this->patient_id,':rating'=>$this->rating));


        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect('doctor-profile.php');
    }


    public function delete(){

        $sqlQuery = "DELETE from `ratings` WHERE rating_id =$this->rating_id";

        $result = $this->conn->exec($sqlQuery);

        //  Utility::dd($$result);

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

