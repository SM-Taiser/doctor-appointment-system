<?php
namespace App\BloodDonor;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;


class BloodDonor extends DB{
    public $table="BloodDonor";
    public $name="";
    public $donor_email="";
    public $phone="";
    public $ready_to_donate="";
    public $age="";
    public $address="";
    public $city="";
    public $blood_grp="";
    public $area_coverage="";
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

        if(array_key_exists('donor_email',$data)){
            $this->donor_email=$data['donor_email'];
        }
        if(array_key_exists('phone',$data)){
            $this->phone=$data['phone'];
        }
        if(array_key_exists('address',$data)){
            $this->address=$data['address'];
        }
        if(array_key_exists('ready_to_donate',$data)){
            $this->ready_to_donate=$data['ready_to_donate'];
        }

        if(array_key_exists('age',$data)){
            $this->age=$data['age'];
        }

        if(array_key_exists('city',$data)){
            $this->city=$data['city'];
        }
        if(array_key_exists('blood_grp',$data)){
            $this->blood_grp=$data['blood_grp'];
        }
        if(array_key_exists('area_coverage',$data)){
            $this->area_coverage=$data['area_coverage'];
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


       $dataArray= array(':name'=>$this->name,':donor_email'=>$this->donor_email,':city'=>$this->city,':blood_grp'=>$this->blood_grp, ':area_coverage'=>$this->area_coverage,  ':password'=>$this->password,
            ':phone'=>$this->phone,':address'=>$this->address,':ready_to_donate'=>$this->ready_to_donate,':age'=>$this->age,':email_verified'=>$this->email_verified );


        $query="INSERT INTO `doctor-information`.`blood_donor` (`name`, `donor_email`, `city`,`blood_grp`,`area_coverage`,`password`, `phone`, `address`,`ready_to_donate`,`age`,`email_verified` ) 
VALUES (:name, :donor_email, :city,:blood_grp,:area_coverage, :password,:phone, :address, :ready_to_donate,:age,  :email_verified)";

        $STH=$this->conn->prepare($query);

        $result = $STH->execute($dataArray);
        
        if ($result) {
            Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Data has been stored successfully, Please check your donor_email and active your account.
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
        $STH = $this->conn->query("SELECT * from blood_donor where is_active='Yes' ");
        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $STH->fetchAll();
        return $allData;
    }

    public function index_trash($mode="ASSOC"){
        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT * from blood_donor where is_active='No' ");

        if($mode=="OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $arrAllData = $STH->fetchAll();

        return $arrAllData;

    }

    public function change_password(){
        $query="UPDATE `doctor-information`.`blood_donor` SET `password`=:password  WHERE `blood_donor`.`donor_email` =:donor_email";
        $result=$this->conn->prepare($query);
        $result->execute(array(':password'=>$this->password,':donor_email'=>$this->donor_email));

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
        $query=" SELECT * FROM blood_donor WHERE donor_email = '$this->donor_email' ";
       // Utility::dd($query);
        $STH =$this->conn->query($query);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        return $STH->fetch();

    }// end of view()

    public function view_profile($fetchMode="ASSOC"){

        $STH = $this->conn->query("SELECT * from blood_donor where donor_email='$this->donor_email'");
        // Utility::dd($STH);
        $STH->setFetchMode(PDO::FETCH_OBJ);


        $singleUser  = $STH->fetch();
        return $singleUser;

    }// end of view()

    public function count_blood_donor($fetchMode="ASSOC"){

        $STH = $this->conn->query("SELECT COUNT(id) AS id FROM blood_donor");
        // Utility::dd($STH);
        $STH->setFetchMode(PDO::FETCH_OBJ);


        $singleUser  = $STH->fetch();
        return $singleUser;

    }// end of view()
    public function view($fetchMode="ASSOC"){

        $STH = $this->conn->query("SELECT * from blood_donor where id='$this->id'");
        // Utility::dd($STH);
        $STH->setFetchMode(PDO::FETCH_OBJ);


        $singleUser  = $STH->fetch();
        return $singleUser;

    }// end of view()

    
    public function validTokenUpdate(){
        $query="UPDATE `doctor-information`.`blood_donor` SET  `email_verified`='".'Yes'."' WHERE `blood_donor`.`donor_email` ='$this->donor_email'";
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

        $query="UPDATE `doctor-information`.`blood_donor` SET `name`=:name,`donor_email` = :donor_email, `city` =:city , `area_coverage`=:area_coverage, `phone` = :phone,
 `address` = :address, `ready_to_donate`=:ready_to_donate,`age`=:age WHERE `blood_donor`.`donor_email` = :donor_email";

        $result=$this->conn->prepare($query);

        $result->execute(array(':name'=>$this->name, ':donor_email'=>$this->donor_email,':city'=>$this->city, ':area_coverage'=>$this->area_coverage,
            ':phone'=>$this->phone,':address'=>$this->address, ':ready_to_donate'=>$this->ready_to_donate,':age'=>$this->age, ':email_verified'=>$this->email_verified ));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect('donors-profile.php');
    }


    public function updates(){

        $query="UPDATE `doctor-information`.`blood_donor` SET `name`=:name,`donor_email` = :donor_email, `city` =:city , `area_coverage`=:area_coverage, `phone` = :phone,
 `address` = :address, `ready_to_donate`=:ready_to_donate,`age`=:age WHERE `blood_donor`.`donor_email` = :donor_email";

        $result=$this->conn->prepare($query);

        $result->execute(array(':name'=>$this->name, ':donor_email'=>$this->donor_email,':city'=>$this->city, ':area_coverage'=>$this->area_coverage,
            ':phone'=>$this->phone,':address'=>$this->address, ':ready_to_donate'=>$this->ready_to_donate,':age'=>$this->age, ':email_verified'=>$this->email_verified ));

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
        }
        else {
            echo "Error";
        }
        return Utility::redirect('manage-bloodDonor.php');
    }



    public function delete(){




        $sqlQuery = "DELETE from `blood_donor` WHERE id = $this->id;";

        $result = $this->conn->exec($sqlQuery);


        if($result){
            Message::message("Success! Data has been deleted Successfully!");
        }
        else{
            Message::message("Error! Data has not been deleted.");

        }



    }// end of delete()

    public function is_delete(){


        $sql = "UPDATE `blood_donor`  SET is_active='No' where id =".$this->id;

        $STH = $this->conn->prepare($sql);


        $result = $STH->execute();

        if($result)
            Message::message("<div  id='message'><h3 align='center'> Success! Data Has Been Trashed Successfully!</h3></div>");
        else
            Message::message("<div id='message'><h3 align='center'> Failed! Data Has Not Been Trashed Successfully!</h3></div>");

        Utility::redirect('manage-bloodDonor.php');



    }// end of is_delete



    public function recoverDoc()
    {

        $sqlQuery = " UPDATE  `blood_donor` SET is_active ='YES' WHERE id = $this->id;";

        $result = $this->conn->exec($sqlQuery);

        if ($result) {
            Message::message("Success! Data has been recovered Successfully!");
        } else {
            Message::message("Error! Data has not been recovered.");

        }
    }


    public function search($keyWord,$keyWords,$keyWordss){
        $mode="obj";
        $mode = strtoupper($mode);
        $sql = "SELECT * FROM `blood_donor` WHERE ready_to_donate='Yes' AND is_active='YES' AND `city`  LIKE '%".$keyWord."%' And `blood_grp` Like '%".$keyWords."%' AND `area_coverage` Like  '%".$keyWordss."%' ";
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
    $sql = "SELECT * FROM `blood_donor` WHERE `is_active`='YES' LIMIT $start ,$ItemsPerPage";
    $STH = $this->conn->query($sql);
    $STH->setFetchMode(PDO::FETCH_OBJ);
    $arrAllData = $STH->fetchAll();
    //Utility::dd($arrAllData);
    return $arrAllData;
}

}

