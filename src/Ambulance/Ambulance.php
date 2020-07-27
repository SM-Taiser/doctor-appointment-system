<?php
namespace App\Ambulance;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;


class Ambulance extends DB{
    public $table="ambulance";
    public $comp_name="";
    public $ambulance_email="";
    public $phone="";
    public $address="";
    public $city="";
    public $area_coverage="";
    public $password="";
    public $amb_comp_id="";
    public $email_verified="";


    public function __construct(){
        parent::__construct();
    }

    public function prepare($data=array()){
        if(array_key_exists('comp_name',$data)){
            $this->comp_name=$data['comp_name'];
        }

        if(array_key_exists('ambulance_email',$data)){
            $this->ambulance_email=$data['ambulance_email'];
        }
        if(array_key_exists('phone',$data)){
            $this->phone=$data['phone'];
        }
        if(array_key_exists('address',$data)){
            $this->address=$data['address'];
        }

        if(array_key_exists('city',$data)){
            $this->city=$data['city'];
        }
        if(array_key_exists('area_coverage',$data)){
            $this->area_coverage=$data['area_coverage'];
        }


        if(array_key_exists('password',$data)){
            $this->password=md5($data['password']);
        }
        if(array_key_exists('amb_comp_id',$data)){
            $this->amb_comp_id=$data['amb_comp_id'];
        }

        if(array_key_exists('email_verified',$data)){
            $this->email_verified=$data['email_verified'];
        }



        return $this;
    }





    public function store() {


        $dataArray= array(':comp_name'=>$this->comp_name,':ambulance_email'=>$this->ambulance_email,':city'=>$this->city, ':area_coverage'=>$this->area_coverage,  ':password'=>$this->password,
            ':phone'=>$this->phone,':address'=>$this->address,':email_verified'=>$this->email_verified );


        $query="INSERT INTO `doctor-information`.`ambulance` (`comp_name`, `ambulance_email`, `city`,`area_coverage`,`password`, `phone`, `address`,`email_verified` ) 
VALUES (:comp_name, :ambulance_email, :city,:area_coverage, :password,:phone, :address, :email_verified)";

        $STH=$this->conn->prepare($query);

        $result = $STH->execute($dataArray);

        if ($result) {
            Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Data has been stored successfully, Please check your ambulance_email and active your account.
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
        $STH = $this->conn->query("SELECT * from ambulance");
      //  Utility::d($STH);
        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $STH->fetchAll();
        return $allData;
    }

    public function index_trash($mode="ASSOC"){
        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT * from ambulance where is_active='No' ");

        if($mode=="OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();

        return $arrAllData;

    }

    public function change_password(){
        $query="UPDATE `doctor-information`.`ambulance` SET `password`=:password  WHERE `ambulance`.`ambulance_email` =:ambulance_email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':password'=>$this->password,':ambulance_email'=>$this->ambulance_email));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Password has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        }

    }

    public function vieww(){
        $query=" SELECT * FROM ambulance WHERE ambulance_email = '$this->ambulance_email' ";
        // Utility::dd($query);
        $STH =$this->conn->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetch();

    }// end of view()

    public function view_profile($fetchMode="ASSOC"){

        $STH = $this->conn->query("SELECT * from ambulance where ambulance_email='$this->ambulance_email'");
        // Utility::dd($STH);
        $STH->setFetchMode(PDO::FETCH_OBJ);


        $singleUser  = $STH->fetch();
        return $singleUser;

    }// end of view()
    public function view($fetchMode="ASSOC"){

        $STH = $this->conn->query("SELECT * from ambulance where amb_comp_id='$this->amb_comp_id'");
        // Utility::dd($STH);
        $STH->setFetchMode(PDO::FETCH_OBJ);


        $singleUser  = $STH->fetch();
        return $singleUser;

    }// end of view()


    public function validTokenUpdate(){
        $query="UPDATE `doctor-information`.`ambulance` SET  `email_verified`='".'Yes'."' WHERE `ambulance`.`ambulance_email` ='$this->ambulance_email'";
        $result=$this->conn->prepare($query);
        $result->execute();

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

        $query="UPDATE `doctor-information`.`ambulance` SET `comp_name`=:comp_name,`ambulance_email` = :ambulance_email, `city` =:city , `area_coverage`=:area_coverage, `phone` = :phone,
 `address` = :address WHERE `ambulance`.`ambulance_email` = :ambulance_email";

        $result=$this->conn->prepare($query);

        $result->execute(array(':comp_name'=>$this->comp_name, ':ambulance_email'=>$this->ambulance_email,':city'=>$this->city, ':area_coverage'=>$this->area_coverage,
            ':phone'=>$this->phone,':address'=>$this->address,':email_verified'=>$this->email_verified ));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect('amb-company-profile.php');
    }


    public function updates(){

        $query="UPDATE `doctor-information`.`ambulance` SET `comp_name`=:comp_name,`ambulance_email` = :ambulance_email, `city` =:city , `area_coverage`=:area_coverage, `phone` = :phone,
 `address` = :address WHERE `ambulance`.`ambulance_email` = :ambulance_email";

        $result=$this->conn->prepare($query);

        $result->execute(array(':comp_name'=>$this->comp_name, ':ambulance_email'=>$this->ambulance_email,':city'=>$this->city, ':area_coverage'=>$this->area_coverage,
            ':phone'=>$this->phone,':address'=>$this->address,':email_verified'=>$this->email_verified ));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect('manage-ambulance.php');
    }



    public function delete(){




        $sqlQuery = "DELETE from `ambulance` WHERE amb_comp_id = $this->amb_comp_id;";

        $result = $this->conn->exec($sqlQuery);


        if($result){
            Message::message("Success! Data has been deleted Successfully!");
        }
        else{
            Message::message("Error! Data has not been deleted.");

        }



    }// end of delete()


    public function count_ambulance_service_provider($fetchMode="ASSOC"){

        $STH = $this->conn->query("SELECT COUNT(amb_comp_id) AS amb_comp_id FROM ambulance");
        // Utility::dd($STH);
        $STH->setFetchMode(PDO::FETCH_OBJ);


        $singleUser  = $STH->fetch();
        return $singleUser;

    }// end of view()

    public function is_delete(){


        $sql = "UPDATE `ambulance`  SET is_active='No' where amb_comp_id =".$this->amb_comp_id;

        $STH = $this->conn->prepare($sql);


        $result = $STH->execute();

        if($result)
            Message::message("<div  id='message'><h3 align='center'> Success! Data Has Been Trashed Successfully!</h3></div>");
        else
            Message::message("<div id='message'><h3 align='center'> Failed! Data Has Not Been Trashed Successfully!</h3></div>");

        Utility::redirect('manage-ambulance.php');



    }// end of is_delete



    public function recoverDoc()
    {

        $sqlQuery = " UPDATE  `ambulance` SET is_active ='YES' WHERE amb_comp_id = $this->amb_comp_id;";

        $result = $this->conn->exec($sqlQuery);

        if ($result) {
            Message::message("Success! Data has been recovered Successfully!");
        } else {
            Message::message("Error! Data has not been recovered.");

        }
    }


    public function search($keyWord,$keyWord1,$keyWords){
        $mode="obj";
        $mode = strtoupper($mode);
        $sql = "SELECT ambulance.comp_name,ambulance.address,ambulance.phone,driver.ambulance_no,driver.specification,driver.availability  FROM ambulance INNER JOIN driver ON ambulance.amb_comp_id=driver.amb_comp_id WHERE driver.availability='Yes' AND `city`  LIKE '%".$keyWord."%' And `specification` Like '%".$keyWord1."%'And `area_coverage` Like '%".$keyWords."%'  ";
        $STH = $this->conn->query($sql);
        //Utility::dd($STH);
        if($mode=="OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();

        return $arrAllData;

    }

    public function indexPaginator($page=1,$ItemsPerPage=3){
        $start = ($page-1)*$ItemsPerPage;
        $sql = "SELECT * FROM `ambulance`  LIMIT $start ,$ItemsPerPage";
        $STH = $this->conn->query($sql);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $arrAllData = $STH->fetchAll();
        //Utility::dd($arrAllData);
        return $arrAllData;
    }

}

