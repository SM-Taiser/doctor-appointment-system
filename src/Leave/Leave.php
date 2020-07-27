<?php
namespace App\Leave;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;


class Leave extends DB
{
    public $table = "day_off";
    public $day_off_id = "";
    public $doctor_id="";
    public $chamb_id="";
    public $date = "";

    public function __construct()
    {
        parent::__construct();
    }

    public function prepare($data = array())
    {
        if (array_key_exists('day_off_id', $data)) {
            $this->day_off_id = $data['day_off_id'];
        }

        if (array_key_exists('doctor_id', $data)) {
            $this->doctor_id = $data['doctor_id'];
        }

        if (array_key_exists('chamb_id', $data)) {
            $this->chamb_id = $data['chamb_id'];
        }

        if (array_key_exists('date', $data)) {
            $this->date = $data['date'];
        }


        return $this;
    }


    public function store()
    {

        $query = "INSERT INTO `doctor-information`.`day_off` (`doctor_id`,`chamb_id`,`date`) 
VALUES (:doctor_id,:chamb_id,:date)";

        $result = $this->conn->prepare($query);

        $result->execute(array( ':doctor_id' => $this->doctor_id, ':chamb_id' => $this->chamb_id, ':date' => $this->date));

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


    public function all_leave($mode = "ASSOC")
    {
       // $_GET['chamb_id'];
        $todays_date = date('Y-m-d');
        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT day_off_id,doctor_id,chamb_id,date from day_off WHERE date >= '$todays_date' AND  doctor_id=".$_GET['id']." AND  chamb_id=".$_GET['chamb_id']  );

        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $STH->fetchAll();
        //Utility::dd($allData);
        return $allData;
    }

    public function view_leave($mode = "ASSOC")
    {
        //$todays_date = date('Y-m-d');
        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT doctors.name,doctors.id,chambers.chamber_name,day_off.day_off_id,day_off.date from day_off inner join doctors inner join chambers WHERE day_off.doctor_id=doctors.id AND day_off.chamb_id=chambers.chamb_id AND doctor_id=".$_SESSION['dr_id']);
//var_dump($STH);
        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $STH->fetchAll();
        //Utility::dd($allData);
        return $allData;
    }



    public function delete()
    {

        $sqlQuery = "DELETE from `day_off` WHERE day_off_id =$this->day_off_id";

        $result = $this->conn->exec($sqlQuery);

        // Utility::dd($$result);

        if ($result) {
            Message::message("Success! Data has been deleted Successfully!");
        } else {
            Message::message("Error! Data has not been deleted.");

        }


    }// end of delete()

}

