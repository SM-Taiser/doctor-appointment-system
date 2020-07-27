<?php
namespace App\Doctor;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;


class Doctor extends DB{
    public $table="doctor";
    public $id="";
    public $name="";
    public $pic="";
    public $city="";
    public $degree="";
    public $designation="";
    public $category="";
    public $email="";
    public $password="";
    public $phone="";
    public $address="";
    public $gender="";
    public $visiting_fee="";
    public $is_active="";
    public $bmdc_reg_no="";
    public $confirm="";
    public $email_verified="";

    public function __construct(){
        parent::__construct();
    }

    public function prepare($data=array()){
        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }

        if(array_key_exists('name',$data)){
            $this->name=$data['name'];
        }

        if(array_key_exists('pic',$data)){
            $this->pic=$data['pic'];
        }
        if(array_key_exists('city',$data)){
            $this->city=$data['city'];
        }

        if(array_key_exists('degree',$data)){
            $this->degree=$data['degree'];
        }


        if(array_key_exists('designation',$data)){
            $this->designation=$data['designation'];
        }
        if(array_key_exists('category',$data)){
            $this->category=$data['category'];
        }
        if(array_key_exists('email',$data)){
            $this->email=$data['email'];
        }

        if(array_key_exists('password',$data)){
            $this->password=md5($data['password']);
        }
        if(array_key_exists('phone',$data)){
            $this->phone=$data['phone'];
        }
        if(array_key_exists('address',$data)){
            $this->address=$data['address'];
        }
        if(array_key_exists('gender',$data)){
            $this->gender=$data['gender'];
        }

        if(array_key_exists('visiting_fee',$data)){
            $this->visiting_fee=$data['visiting_fee'];
        }

        if(array_key_exists('confirm',$data)){
            $this->confirm=$data['confirm'];
        }
        if(array_key_exists('bmdc_reg_no',$data)){
            $this->bmdc_reg_no=$data['bmdc_reg_no'];
        }
        if(array_key_exists('is_active',$data)){
            $this->is_active=$data['is_active'];
        }

        if(array_key_exists('email_verified',$data)){
            $this->email_verified=$data['email_verified'];
        }



        return $this;
    }





    public function store() {




        $query="INSERT INTO `doctor-information`.`doctors` (`name`,`pic`,`city`,`degree`, `designation`, `email`,`password`, `category`, `phone`, `address`,`gender`,
        `visiting_fee`,`is_active`,`confirm`,`bmdc_reg_no`,`email_verified`) 
VALUES (:name,:pic,:city,:degree, :designation, :email,:password, :category,:phone, :address,:gender, :visiting_fee, :is_active,:confirm,:bmdc_reg_no, :email_verified)";

        $result=$this->conn->prepare($query);

        $result->execute(array(':name'=>$this->name,':pic'=>$this->pic,':city'=>$this->city,':degree'=>$this->degree,':designation'=>$this->designation,':email'=>$this->email,':password'=>$this->password,':category'=>$this->category,
            ':phone'=>$this->phone,':address'=>$this->address,':gender'=>$this->gender,':visiting_fee'=>$this->visiting_fee,':is_active'=>$this->is_active,':confirm'=>$this->confirm,':bmdc_reg_no'=>$this->bmdc_reg_no,':email_verified'=>$this->email_verified));

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

    public function index($mode="ASSOC")
    {
        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT * from doctors WHERE confirm=1");
        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();
        return $arrAllData;
    }

    public function new_doctor_req($mode="ASSOC")
    {
        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT * from doctors WHERE confirm=0 ");
        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();
        return $arrAllData;
    }


    public function all_doctor($mode="ASSOC")
    {
        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT * from doctors");
        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();
        return $arrAllData;
    }

    public function index_trash($mode="ASSOC"){
        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT * from doctors where is_active='No' ");

        if($mode=="OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();

        return $arrAllData;

    }

    public function view($fetchMode="ASSOC"){

        $STH = $this->conn->query('SELECT * from doctors where id='.$this->id);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        // Utility::dd($STH);
        $singleUser  = $STH->fetch();
        return $singleUser;

    }// end of view()


    public function update_is_confirmation(){

        $query="UPDATE `doctor-information`.`doctors` SET `confirm`=:confirm
  WHERE `doctors`.`id` = ".$this->id;

        $result=$this->conn->prepare($query);
        // Utility::dd($result);

        $result->execute(array(':confirm'=>$this->confirm));
        // Utility::dd($result);

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> New Doctor has been confirmed.
              </div>");
            //echo "suc";
        }
        else {
            echo "Error";
        }

        return Utility::redirect('manage_new_doctor_request.php');
    }
    public function view_profile($fetchMode="ASSOC"){

        $STH = $this->conn->query("SELECT * from doctors where email='$this->email'");
        // Utility::dd($STH);
        $STH->setFetchMode(PDO::FETCH_OBJ);


        $singleUser  = $STH->fetch();
        return $singleUser;

    }// end of view()
    public function vieww($fetchMode="ASSOC"){

        $STH = $this->conn->query("SELECT * from doctors where id=".$_GET['id']);
        // Utility::dd($STH);
        $STH->setFetchMode(PDO::FETCH_OBJ);


        $singleUser  = $STH->fetch();
        return $singleUser;

    }// end of view()

    public function count_doctors($fetchMode="ASSOC"){

        $STH = $this->conn->query("SELECT COUNT(id) AS id FROM doctors");
        // Utility::dd($STH);
        $STH->setFetchMode(PDO::FETCH_OBJ);


        $singleUser  = $STH->fetch();
        return $singleUser;

    }// end of view()




    public function doctor_category($fetchMode="ASSOC"){

        $STH = $this->conn->query('SELECT * from doctors where category='.$this->category);

        $fetchMode = strtoupper($fetchMode);
        if(substr_count($fetchMode, "OBJ")>0)   $STH->setFetchMode(PDO::FETCH_OBJ);
        else               $STH->setFetchMode(PDO::FETCH_ASSOC);

        $arrOneData  = $STH->fetch();
        return $arrOneData;

    }// end of view()




    public function update(){

        $query="UPDATE `doctor-information`.`doctors` SET `name`=:name,`pic`=:pic,`city`=:city,`degree`=:degree,`designation`=:designation,`email`=:email,`phone`=:phone,
 `address` = :address,`gender`=:gender,`visiting_fee`=:visiting_fee,`is_active`=:is_active WHERE `doctors`.`email` = :email";

        $result=$this->conn->prepare($query);

        $result->execute(array(':name'=>$this->name,':pic'=>$this->pic,':city'=>$this->city,  ':degree'=>$this->degree, ':designation'=>$this->designation,':email'=>$this->email, ':phone'=>$this->phone,
            ':address'=>$this->address ,':gender'=>$this->gender, ':visiting_fee'=>$this->visiting_fee,':is_active'=>$this->is_active));

        // Utility::dd( $result);
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

    public function updates(){

        $query="UPDATE `doctor-information`.`doctors` SET `name`=:name,`pic`=:pic,`city`=:city,`degree`=:degree,`designation`=:designation,`email`=:email,`phone`=:phone,
 `address` = :address,`gender`=:gender,`visiting_fee`=:visiting_fee,`is_active`=:is_active WHERE `doctors`.`email` = :email";

        $result=$this->conn->prepare($query);

        $result->execute(array(':name'=>$this->name,':pic'=>$this->pic,':city'=>$this->city,  ':degree'=>$this->degree, ':designation'=>$this->designation,':email'=>$this->email,':phone'=>$this->phone,
            ':address'=>$this->address ,':gender'=>$this->gender, ':visiting_fee'=>$this->visiting_fee,':is_active'=>$this->is_active));

        //   Utility::dd( $result);
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
        Utility::redirect('manage-doctor.php');


    }// end of update()

    public function is_delete(){


        $sql = "UPDATE doctors  SET is_active='No' where id =".$this->id;

        $STH = $this->conn->prepare($sql);


        $result = $STH->execute();

        if($result)
            Message::message("<div  id='message'><h3 align='center'> Success! Data Has Been Trashed Successfully!</h3></div>");
        else
            Message::message("<div id='message'><h3 align='center'> Failed! Data Has Not Been Trashed Successfully!</h3></div>");

        Utility::redirect('manage-doctor.php');



    }// end of is_delete

    public function change_category(){
        $query="UPDATE `doctor-information`.`doctors` SET `category`=:category  WHERE `doctors`.`email` =:email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':category'=>$this->category,':email'=>$this->email));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> category has been updated  successfully.
              </div>");
            // Utility::redirect('../../../../views/SEIPXXXX/User/Profile/signup.php');
        }
        else {
            echo "Error";
        }

    }



    public function validTokenUpdate(){
        $query="UPDATE `doctor-information`.`doctors` SET  `email_verified`='".'Yes'."' WHERE `doctors`.`email` =:email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':email'=>$this->email));

        if($result){
            Message::message("
             <div class=\"alert alert-success\">
             <strong>Success!</strong> Email verification has been successful. Please login now!
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect('../../views/admin/Profile/signup.php');
    }
    public function delete(){




        $sqlQuery = "DELETE from `doctors` WHERE id = $this->id;";

        $result = $this->conn->exec($sqlQuery);

        // Utility::dd($$result);
        if($result){
            Message::message("Success! Data has been deleted Successfully!");
        }
        else{
            Message::message("Error! Data has not been deleted.");

        }



    }// end of delete()


    public function recoverDoc(){

        $sqlQuery = " UPDATE  `doctors` SET is_active ='Yes' WHERE id = $this->id;";

        $result = $this->conn->exec($sqlQuery);

        if($result){
            Message::message("Success! Data has been recovered Successfully!");
        }
        else{
            Message::message("Error! Data has not been recovered.");

        }



    }// end of recover()

    public function doctorsCategory($mode="ASSOC", $catID){

        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT * from doctors where category=".$catID);

        if($mode=="OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();

        return $arrAllData;

    }

    public function searchDoctor($mode="ASSOC", $keyWord){

        $mode = strtoupper($mode);
        $sql = "SELECT * FROM `doctors` WHERE`name` LIKE '%".$keyWord."%'";
        $STH = $this->conn->query($sql);

        if($mode=="OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();

        return $arrAllData;

    }


    public function search($keyWord,$keyWords,$key){
        $mode="obj";
        $mode = strtoupper($mode);
        $sql = "SELECT 
  doctors.id,
  doctors.phone,doctors.address,doctors.visiting_fee,doctors.designation,doctors.category,doctors.city,
 doctors. degree,
 doctors.name,doctors.pic, 
  (CHAR_LENGTH(degree) - CHAR_LENGTH(REPLACE(degree, ',', '')) + 1) as total_degree,
  
  count( appointment_schedule.is_read) as total_appointment,
  IFNULL (AVG(ratings.rating),0) as total_rating, .25*count( appointment_schedule.is_read) +IFNULL (.25*AVG(ratings.rating),0)+
  .50*(CHAR_LENGTH(degree) - CHAR_LENGTH(REPLACE(degree, ',', '')) + 1) as sum 
FROM doctors left join ratings on
(ratings.doctor_id=doctors.id ) 
  left join  appointment_schedule on ( doctors.id=appointment_schedule.doctor_id AND appointment_schedule.is_read=1 ) WHERE doctors.is_active='Yes' AND doctors.confirm=1 
 AND `city`  LIKE '%".$keyWord."%' AND `category` Like '%".$keyWords."%'   AND `name` Like '%".$key."%' GROUP by doctors.id
ORDER by sum desc";
        $STH = $this->conn->query($sql);


        //Utility::dd($STH);
        if($mode=="OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();
        //   Utility::dd($arrAllData);

        return $arrAllData;

    }



    public function patient_view_doctor_profile(){
        $mode="obj";
        $mode = strtoupper($mode);
        $sql = "SELECT appointment.appointment_id,appointment.id,appointment.chamb_id,appointment.day,appointment.time, doctors.name,doctors.pic,doctors.degree,doctors.is_active,doctors.city,doctors.designation,doctors.email,doctors.phone,doctors.category,doctors.address,doctors.gender,doctors.visiting_fee,chambers.chamber_name,chambers.address FROM `appointment` INNER JOIN `doctors`INNER JOIN `chambers` WHERE appointment.id=doctors.id AND appointment.chamb_id=chambers.chamb_id AND doctors.is_active='Yes'AND doctors.id=".$_GET['id'];
        $STH = $this->conn->query($sql);


        //Utility::dd($STH);
        if($mode=="OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();
        //   Utility::dd($arrAllData);

        return $arrAllData;

    }



    public function indexPaginator($page=1,$ItemsPerPage=5){
        $start = ($page-1)*$ItemsPerPage;
        $sql = "SELECT * FROM `doctors` WHERE `is_active`='YES' LIMIT $start,$ItemsPerPage";
        $STH = $this->conn->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $arrAllData = $STH->fetchAll();
        Utility::dd($arrAllData);
        //return $arrAllData;
    }


}

