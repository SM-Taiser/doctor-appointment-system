<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 5/29/2017
 * Time: 4:00 PM
 */


namespace App\Appointment;
if(!isset($_SESSION) )  session_start();

use App\Utility\Utility;
use App\Message\Message;
use App\Model\Database;
use App\Chambers\Chambers;


use PDO;

class Appointment extends Database


{
    public $time;
    public $day;
    public $appointment_id;
    public $id;
    public $chamb_id;

    public function prepare($postArray){

        if(array_key_exists("time",$postArray)){
            $this->time = $postArray['time'];
        }

        if(array_key_exists("day",$postArray)){
            $this->day = $postArray['day'];
        }

        if(array_key_exists("appointment_id",$postArray)){
            $this->appointment_id = $postArray['appointment_id'];

        }

        if(array_key_exists("id",$postArray)){
           $this->id = $postArray['id'];

        }
        if(array_key_exists("chamb_id",$postArray)){
            $this->chamb_id = $postArray['chamb_id'];

        }


    }// end of setData()

    public function store(){
        $id=$this->id;
         $chamb_id=$this->chamb_id;
        $day = $this->day;
         $days = implode(",",$day);
        $time = $this->time;
        $times = implode(",",$time);

        $sqlQuery = "INSERT INTO appointment (id,chamb_id,day,time) VALUES (?,?,?,?);";


        $dataArray = array($id,$chamb_id,$days,$times) ;

        $STH = $this->conn->prepare($sqlQuery);


        $result = $STH->execute($dataArray);



        if($result){
            Message::message("Success! Data has been inserted Successfully!");
            return Utility::redirect($_SERVER['HTTP_REFERER']);
        }
        else{
            Message::message("Error! Data has not been inserted.");
            return Utility::redirect($_SERVER['HTTP_REFERER']);

        }



    }// end of store()

    public function index(){
        $sqlQuery = "SELECT chambers.chamb_id,appointment.appointment_id,chambers.chamber_name,appointment.day,appointment.time FROM appointment INNER JOIN chambers ON appointment.chamb_id=chambers.chamb_id WHERE appointment.id=".$_SESSION['dr_id'];

      //  $sqlQuery = "select * from appointment WHERE id=".$_SESSION['dr_id'];

        $STH = $this->conn->query($sqlQuery);
     //  var_dump($STH);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();

       return $allData;

    }

    public function edit_doctors_schedule(){
        $sqlQuery = "SELECT chambers.chamb_id,appointment.appointment_id,chambers.chamber_name,appointment.day,appointment.time FROM appointment INNER JOIN chambers ON appointment.chamb_id=chambers.chamb_id WHERE appointment.id=".$_GET['id'];

        //  $sqlQuery = "select * from appointment WHERE id=".$_SESSION['dr_id'];

        $STH = $this->conn->query($sqlQuery);
        //  var_dump($STH);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();

        return $allData;

    }



    public function manage_doctors_schedule(){
        $sqlQuery = "SELECT chambers.chamb_id,appointment.appointment_id,chambers.chamber_name,appointment.day,appointment.time ,doctors.name,doctors.id FROM appointment INNER JOIN chambers INNER JOIN doctors on appointment.chamb_id=chambers.chamb_id AND appointment.id=doctors.id ";

        //  $sqlQuery = "select * from appointment WHERE id=".$_SESSION['dr_id'];

        $STH = $this->conn->query($sqlQuery);
          //var_dump($STH);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $allData = $STH->fetchAll();

        return $allData;

    }


    public function view(){

        $sqlQuery = "select * from appointment WHERE chamb_id='$this->chamb_id' AND id='$this->id' AND appointment_id='$this->appointment_id'" ;


        $STH = $this->conn->query($sqlQuery);
       //var_dump($STH);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $singleData = $STH->fetch();
       //var_dump($singleData);

      return $singleData;

    }

    public function  admin_view_doctors_schedule(){

        $sqlQuery ="select doctors.name,chambers.chamber_name,appointment.day,appointment.time from appointment INNER JOIN doctors INNER JOIN chambers on appointment.chamb_id=chambers.chamb_id AND appointment.id=doctors.id WHERE chambers.chamb_id='$this->chamb_id' AND .doctors.id='$this->id' AND appointment.appointment_id='$this->appointment_id'" ;

        $STH = $this->conn->query($sqlQuery);
        //var_dump($STH);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $singleData = $STH->fetch();
        //var_dump($singleData);

        return $singleData;

    }


    public function appointment_view(){

        $sqlQuery = "select * from appointment WHERE chamb_id='$this->chamb_id' AND appointment_id='$this->appointment_id'" ;


        $STH = $this->conn->query($sqlQuery);
        //var_dump($STH);

        $STH->setFetchMode(PDO::FETCH_OBJ);
        $singleData = $STH->fetch();
        //var_dump($singleData);

        return $singleData;

    }

    public function update(){


     $chamb_id=$this->chamb_id;
        $day = $this->day;
       $days=implode(",",$day);
       $time = $this->time;
        $times = implode(",",$time);

        $appointment_id = $this->appointment_id;

        $sqlQuery = "UPDATE appointment SET appointment_id = ?,chamb_id= ?,day=?,time=? WHERE appointment_id =$this->appointment_id" ;
        $dataArray = array($appointment_id,$chamb_id,$days,$times) ;
        //var_dump($dataArray);


        $STH = $this->conn->prepare($sqlQuery);
//var_dump($STH);

        $result = $STH->execute($dataArray);


        if($result){
            Message::message("Success! Data has been updated Successfully!");
        }
        else{
            Message::message("Error! Data has not been updated.");

        }
     return Utility::redirect('doctor-profile.php');


    }


    public function admin_update_doctors_schedule(){


        $chamb_id=$this->chamb_id;
        $day = $this->day;
        $days=implode(",",$day);
        $time = $this->time;
        $times = implode(",",$time);

        $appointment_id = $this->appointment_id;

        $sqlQuery = "UPDATE appointment SET appointment_id = ?,chamb_id= ?,day=?,time=? WHERE appointment_id =$this->appointment_id" ;
        $dataArray = array($appointment_id,$chamb_id,$days,$times) ;
        //var_dump($dataArray);


        $STH = $this->conn->prepare($sqlQuery);
//var_dump($STH);

        $result = $STH->execute($dataArray);


        if($result){
            Message::message("Success! Data has been updated Successfully!");
        }
        else{
            Message::message("Error! Data has not been updated.");

        }
        return Utility::redirect('manage_doctors_schedule.php');


    }








    public function delete(){
        $sqlQuery = "DELETE from appointment WHERE appointment_id= $this->appointment_id;";
        $result= $this->conn->exec($sqlQuery);
        if($result){
            Message::message("Success! Data has been deleted successfully");
        }
        else{
            Message::message("Error! Data has been not deleted");
        }

    }//end of delete()

    public function admin_delete_doctors_schedule(){
        $sqlQuery = "DELETE from appointment WHERE appointment_id= $this->appointment_id;";
        $result= $this->conn->exec($sqlQuery);
        if($result){
            Message::message("Success! Data has been deleted successfully");
        }
        else{
            Message::message("Error! Data has been not deleted");
        }

    }//end of delete()


}// end of personHobby Class












