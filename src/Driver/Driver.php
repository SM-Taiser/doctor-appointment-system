<?php
namespace App\Driver;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;


class Driver extends DB
{
    public $table = "chambers";

    public $driver_id = "";
    public $amb_comp_id = "";
    public $ambulance_no = "";
    public $specification="";
    public $driver_name = "";
    public $email = "";

    public $phone = "";
    public $address = "";
    public $availability = "";
    public $email_verified="";

    public function __construct()
    {
        parent::__construct();
    }

    public function prepare($data = array())
    {
        if (array_key_exists('driver_id', $data)) {
            $this->driver_id = $data['driver_id'];
        }

        if (array_key_exists('amb_comp_id', $data)) {
            $this->amb_comp_id = $data['amb_comp_id'];
        }

        if (array_key_exists('ambulance_no', $data)) {
            $this->ambulance_no = $data['ambulance_no'];
        }

        if (array_key_exists('specification', $data)) {
            $this->specification = $data['specification'];
        }

        if (array_key_exists('driver_name', $data)) {
            $this->driver_name = $data['driver_name'];
        }

        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }


        if (array_key_exists('phone', $data)) {
            $this->phone = $data['phone'];
        }

        if (array_key_exists('address', $data)) {
            $this->address = $data['address'];
        }

        if (array_key_exists('availability', $data)) {
            $this->availability = $data['availability'];

        }

        if (array_key_exists('email_verified', $data)) {
            $this->email_verified = $data['email_verified'];

        }
        return $this;
    }
    public function store()
    {

        $query = "INSERT INTO `doctor-information`.`driver` (`amb_comp_id`,`ambulance_no`,`driver_name`,`specification`,`email`,`phone`,`address`,`availability`,`email_verified`) 
VALUES (:amb_comp_id,:ambulance_no,:driver_name,:specification,:email,:phone,:address,:availability,:email_verified)";

        $result = $this->conn->prepare($query);

        $result->execute(array(':amb_comp_id' => $this->amb_comp_id, ':ambulance_no' => $this->ambulance_no, ':driver_name' => $this->driver_name, ':specification'=>$this->specification,':email' => $this->email, ':phone' => $this->phone, ':address' => $this->address, ':availability' => $this->availability,':email_verified'=>$this->email_verified));

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


    public function index($mode = "ASSOC")
    {
        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT driver_id,ambulance_no,driver_name,specification,email,phone,address,availability from driver WHERE amb_comp_id=" . $_SESSION['amb_comp_id']);

        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $STH->fetchAll();
        //Utility::dd($allData);
        return $allData;
    }

    public function get_all_driver($mode="ASSOC")
    {
        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT ambulance.comp_name,ambulance.amb_comp_id,driver.address,driver.driver_id,driver.driver_name,driver.email,driver.phone,driver.ambulance_no,driver.specification,driver.availability  FROM ambulance INNER JOIN driver ON ambulance.amb_comp_id=driver.amb_comp_id ");

        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $STH->fetchAll();
        //Utility::dd($allData);
        return $allData;
    }


    public function view($fetchMode = "ASSOC")
    {

        $STH = $this->conn->query('SELECT ambulance.comp_name,ambulance.amb_comp_id,ambulance.address,driver.driver_id,driver.driver_name,driver.email,ambulance.phone,driver.ambulance_no,driver.specification,driver.availability  FROM ambulance INNER JOIN driver ON ambulance.amb_comp_id=driver.amb_comp_id WHERE driver_id=' . $this->driver_id);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        // Utility::dd($STH);
        $singleUser = $STH->fetch();
        return $singleUser;

    }// end of view()

    public function view_profile($fetchMode="ASSOC"){

        $STH = $this->conn->query("SELECT * from driver where email='$this->email'");
        // Utility::dd($STH);
        $STH->setFetchMode(PDO::FETCH_OBJ);


        $singleUser  = $STH->fetch();
        return $singleUser;

    }// end of view()

    public function update()
    {

        $query = "UPDATE `doctor-information`.`driver` SET `ambulance_no`=:ambulance_no,`driver_name` =:driver_name,`specification`=:specification,`email`=:email,`phone`=:phone,
 `address` = :address, `availability`=:availability WHERE `driver`.`driver_id` = ". $this->driver_id;
        $result = $this->conn->prepare($query);
        // Utility::dd($result);

        $result->execute(array(':ambulance_no' => $this->ambulance_no, ':driver_name' => $this->driver_name, ':specification'=>$this->specification, ':email' => $this->email, ':phone' => $this->phone, ':address' => $this->address, ':availability' => $this->availability));

        //  Utility::dd($result);

        if ($result) {
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
            //echo "suc";
        } else {
            echo "Error";
        }
        return Utility::redirect('amb-company-profile.php');
    }

    public function updates()
    {

        $query = "UPDATE `doctor-information`.`driver` SET `ambulance_no`=:ambulance_no,`driver_name` =:driver_name,`specification`=:specification,`email`=:email,`phone`=:phone,
 `address` = :address, `availability`=:availability WHERE `driver`.`email` = :email";

        $result = $this->conn->prepare($query);
        // Utility::dd($result);

        $result->execute(array(':ambulance_no' => $this->ambulance_no, ':driver_name' => $this->driver_name, ':specification'=>$this->specification, ':email' => $this->email, ':phone' => $this->phone, ':address' => $this->address, ':availability' => $this->availability));

        //  Utility::dd($result);

        if ($result) {
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
            //echo "suc";
        } else {
            echo "Error";
        }
        return Utility::redirect('drivers-profile.php');
    }

    public function admin_update_driver()
    {

        $query = "UPDATE `doctor-information`.`driver` SET `ambulance_no`=:ambulance_no,`driver_name` =:driver_name,`specification`=:specification,`email`=:email,`phone`=:phone,
 `address` = :address, `availability`=:availability WHERE `driver`.`email` = :email";

        $result = $this->conn->prepare($query);
        // Utility::dd($result);

        $result->execute(array(':ambulance_no' => $this->ambulance_no, ':driver_name' => $this->driver_name, ':specification'=>$this->specification, ':email' => $this->email, ':phone' => $this->phone, ':address' => $this->address, ':availability' => $this->availability));

        //  Utility::dd($result);

        if ($result) {
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Data has been updated  successfully.
              </div>");
            //echo "suc";
        } else {
            echo "Error";
        }
        return Utility::redirect('manage_driver.php');
    }



    public function validTokenUpdate(){
        $query="UPDATE `doctor-information`.`driver` SET  `email_verified`='".'Yes'."' WHERE `driver`.`email` ='$this->email'";
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


    public function delete()
    {

        $sqlQuery = "DELETE from `driver` WHERE driver_id =$this->driver_id";

        $result = $this->conn->exec($sqlQuery);

        //  Utility::dd($$result);

        if ($result) {
            Message::message("Success! Data has been deleted Successfully!");
        } else {
            Message::message("Error! Data has not been deleted.");

        }


    }// end of delete()


}


