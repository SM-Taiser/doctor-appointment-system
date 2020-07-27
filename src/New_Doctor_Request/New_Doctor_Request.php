<?php
namespace App\New_Doctor_Request;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;


class New_Doctor_Request extends DB{
    public $table="new_doctor_request";
    public $new_doctor_request_id="";
    public $name="";
    public $pic="";
    public $city="";
    public $designation="";
    public $category="";
    public $degree="";
    public $email="";
    public $phone="";
    public $address="";
    public $gender="";
    public $bmdc_reg_no="";
    public $confirmation="";
    public $visiting_fee="";


    public function __construct(){
        parent::__construct();
    }

    public function prepare($data=array()){
        if(array_key_exists('new_doctor_request_id',$data)){
            $this->new_doctor_request_id=$data['new_doctor_request_id'];
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

        if(array_key_exists('designation',$data)){
            $this->designation=$data['designation'];
        }
        if(array_key_exists('category',$data)){
            $this->category=$data['category'];
        }
        if(array_key_exists('email',$data)){
            $this->email=$data['email'];
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
        if(array_key_exists('bmdc_reg_no',$data)){
            $this->bmdc_reg_no=$data['bmdc_reg_no'];
        }

        if(array_key_exists('confirmation',$data)){
            $this->confirmation=$data['confirmation'];
        }
        if(array_key_exists('degree',$data)){
            $this->degree=$data['degree'];
        }

        return $this;
    }





    public function store() {

        $query="INSERT INTO `doctor-information`.`new_doctor_request` (`name`,`pic`,`city`,`bmdc_reg_no`, `designation`, `email`,`category`, `phone`, `address`,`gender`,
        `visiting_fee`,`confirmation`,`degree`) 
VALUES (:name,:pic,:city,:bmdc_reg_no, :designation, :email, :category,:phone, :address,:gender, :visiting_fee,:confirmation,:degree)";

        $result=$this->conn->prepare($query);

        $result->execute(array(':name'=>$this->name,':pic'=>$this->pic,':city'=>$this->city,':bmdc_reg_no'=>$this->bmdc_reg_no,':designation'=>$this->designation,':email'=>$this->email,':category'=>$this->category,
            ':phone'=>$this->phone,':address'=>$this->address,':gender'=>$this->gender,':visiting_fee'=>$this->visiting_fee, ':confirmation'=>$this->confirmation, ':degree'=>$this->degree));


        if ($result) {
            Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Thank you.We are currently processing your request.<br>
                                                    A confirmation SMS will be sent to you when you are done.
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
        $STH = $this->conn->query("SELECT * from new_doctor_request ");
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

        $STH = $this->conn->query('SELECT * from new_doctor_request where new_doctor_request_id='.$this->new_doctor_request_id);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        // Utility::dd($STH);
        $singleUser  = $STH->fetch();
        return $singleUser;

    }// end of view()



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






    public function update_is_confirmation(){

        $query="UPDATE `doctor-information`.`new_doctor_request` SET `confirmation`=:confirmation
  WHERE `new_doctor_request`.`new_doctor_request_id` = ".$this->new_doctor_request_id;

        $result=$this->conn->prepare($query);
        // Utility::dd($result);

        $result->execute(array(':confirmation'=>$this->confirmation));
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


    public function update(){

        $query="UPDATE `doctor-information`.`new_doctor_request` SET `name`=:name,`pic`=:pic,`city`=:city,`bmdc_reg_no`=:bmdc_reg_no,`designation`=:designation,`email`=:email, `category`=:category,`phone`=:phone,
 `address` = :address,`gender`=:gender,`visiting_fee`=:visiting_fee,`degree`=:degree WHERE `new_doctor_request`.`new_doctor_request_id` = ".$this->new_doctor_request_id;

        $result=$this->conn->prepare($query);

        $result->execute(array(':name'=>$this->name,':pic'=>$this->pic,':city'=>$this->city,  ':bmdc_reg_no'=>$this->bmdc_reg_no, ':designation'=>$this->designation,':email'=>$this->email, ':category'=>$this->category,':phone'=>$this->phone,
            ':address'=>$this->address ,':gender'=>$this->gender, ':visiting_fee'=>$this->visiting_fee,':degree'=>$this->degree));

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
        return Utility::redirect('manage_new_doctor_request.php');
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




        $sqlQuery = "DELETE from `new_doctor_request` WHERE new_doctor_request_id = $this->new_doctor_request_id;";

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

        $sqlQuery = " UPDATE  `doctors` SET is_active ='YES' WHERE id = $this->id;";

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


    public function search($keyWord,$keyWords,$keyWordss){
        $mode="obj";
        $mode = strtoupper($mode);
        $sql = "SELECT doctors.id,doctors.name,doctors.pic,doctors.area_coverage,doctors.is_active,doctors.city,doctors.designation,doctors.email,doctors.phone,doctors.category,doctors.address,doctors.gender,doctors.visiting_fee,chambers.chamb_id,chambers.chamber_name,chambers.address FROM `doctors`INNER JOIN `chambers` on doctors.id=chambers.id WHERE  doctors.is_active='Yes' AND `city`  LIKE '%".$keyWord."%' AND `category` Like '%".$keyWords."%' AND `area_coverage` LIKE  '%".$keyWordss."%' ";
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

