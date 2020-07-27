<?php
namespace App\Contact_Us;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;


class Contact_Us extends DB
{
    public $table = "contact_us";
    public $contact_id = "";
    public $name="";
    public $email="";
    public $phone = "";
    public $msg="";
    public function __construct()
    {
        parent::__construct();
    }

    public function prepare($data = array())
    {
        if (array_key_exists('contact_id', $data)) {
            $this->contact_id = $data['contact_id'];
        }

        if (array_key_exists('name', $data)) {
            $this->name = $data['name'];
        }

        if (array_key_exists('email', $data)) {
            $this->email = $data['email'];
        }

        if (array_key_exists('phone', $data)) {
            $this->phone = $data['phone'];
        }
        if (array_key_exists('msg', $data)) {
            $this->msg = $data['msg'];
        }

        return $this;
    }


    public function store()
    {

        $query = "INSERT INTO `doctor-information`.`contact_us` (`name`,`email`,`phone`,`msg`) 
VALUES (:name,:email,:phone,:msg)";

        $result = $this->conn->prepare($query);

        $result->execute(array( ':name' => $this->name, ':email' => $this->email, ':phone' => $this->phone,':msg'=>$this->msg));

        if ($result) {
            Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Data has been stored successfully
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
        // $_GET['email'];

        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT * from contact_us " );

        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $STH->fetchAll();
        //Utility::dd($allData);
        return $allData;
    }


    public function view($fetchMode="ASSOC"){

        $STH = $this->conn->query('SELECT * from contact_us where contact_id='.$this->contact_id);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        // Utility::dd($STH);
        $singleUser  = $STH->fetch();
        return $singleUser;

    }// end of view()



    public function delete()
    {

        $sqlQuery = "DELETE from `contact_us` WHERE contact_id =$this->contact_id";

        $result = $this->conn->exec($sqlQuery);

        // Utility::dd($$result);

        if ($result) {
            Message::message("Success! Data has been deleted Successfully!");
        } else {
            Message::message("Error! Data has not been deleted.");

        }


    }// end of delete()

}

