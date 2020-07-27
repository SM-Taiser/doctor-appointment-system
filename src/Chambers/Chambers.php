<?php
namespace App\Chambers;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;


class Chambers extends DB{
    public $table="chambers";

    public $chamb_id="";
    public $id="";
    public $chamber_name="";
    public $address="";

    public function __construct(){
        parent::__construct();
    }

    public function prepare($data=array()){
        if(array_key_exists('chamb_id',$data)){
            $this->chamb_id=$data['chamb_id'];
        }

        if(array_key_exists('id',$data)){
            $this->id=$data['id'];
        }

        if(array_key_exists('chamber_name',$data)){
            $this->chamber_name=$data['chamber_name'];
        }

        if(array_key_exists('address',$data)){
            $this->address=$data['address'];
        }



        return $this;
    }





    public function store() {

        $query="INSERT INTO `doctor-information`.`chambers` (`id`,`chamber_name`,`address`) 
VALUES (:id,:chamber_name,:address)";

        $result=$this->conn->prepare($query);

        $result->execute(array(':id'=>$this->id,':chamber_name'=>$this->chamber_name,':address'=>$this->address));

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
        $STH = $this->conn->query("SELECT chamb_id,chamber_name,address from chambers WHERE id=".$_SESSION['dr_id']);

        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $STH->fetchAll();
        //Utility::dd($allData);
        return $allData;
    }



    public function view($fetchMode="ASSOC"){

        $STH = $this->conn->query('SELECT * from chambers where chamb_id='.$this->chamb_id);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        // Utility::dd($STH);
        $singleUser  = $STH->fetch();
        return $singleUser;

    }// end of view()





    public function update(){

        $query="UPDATE `doctor-information`.`chambers` SET `chamber_name` =:chamber_name,
 `address` = :address  WHERE `chambers`.`chamb_id` = ".$this->chamb_id;

        $result=$this->conn->prepare($query);
        // Utility::dd($result);

        $result->execute(array(':chamber_name'=>$this->chamber_name,':address'=>$this->address));
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

        $query="UPDATE `doctor-information`.`chambers` SET `chamber_name` =:chamber_name,
 `address` = :address  WHERE `chambers`.`email` = :email";

        $result=$this->conn->prepare($query);

        $result->execute(array(':id'=>$this->id,':chamber_name'=>$this->chamber_name,':address'=>$this->address));


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

        $sqlQuery = "DELETE from `chambers` WHERE chamb_id =$this->chamb_id";

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

