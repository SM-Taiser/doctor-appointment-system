<?php
namespace App\Payment;
use App\Message\Message;
use App\Utility\Utility;
use App\Model\Database as DB;
use PDO;


class Payment extends DB{
    public $table="payment";
    public $payment_id="";
    public $schedule_id="";
    public $doctor_id="0";
    public $patient_id="";
    public $chamb_id="";
    public $time="";
    public $is_approved="";
    public $transaction_id="";
    public $date="";
    public $day="";
    public $amount="";
    public $is_read="";
    public $Enddate="";
    public $Startdate="";
    public function __construct(){
        parent::__construct();
    }

    public function prepare($data=array()){
        if(array_key_exists('payment_id',$data)){
            $this->payment_id=$data['payment_id'];
        }
        if(array_key_exists('schedule_id',$data)){
            $this->schedule_id=$data['schedule_id'];
        }

        if(array_key_exists('doctor_id',$data)){
            $this->doctor_id=$data['doctor_id'];
        }

        if(array_key_exists('patient_id',$data)){
            $this->patient_id=$data['patient_id'];
        }
        if(array_key_exists('transaction_id',$data)){
            $this->transaction_id=$data['transaction_id'];
        }
        if(array_key_exists('date',$data)){
            $this->date=$data['date'];
        }
        if(array_key_exists('day',$data)){
            $this->day=$data['day'];
        }
        if(array_key_exists('amount',$data)){
            $this->amount=$data['amount'];
        }
        if(array_key_exists('time',$data)){
            $this->time=$data['time'];
        }

        if(array_key_exists('is_read',$data)){
            $this->is_read=$data['is_read'];
        }
        if(array_key_exists('chamb_id',$data)){
            $this->chamb_id=$data['chamb_id'];
        }

        if(array_key_exists('Startdate',$data)){
            $this->Startdate=$data['Startdate'];
        }
        if(array_key_exists('Enddate',$data)){
            $this->Enddate=$data['Enddate'];
        }

        return $this;
    }





    public function store() {

        $query1="INSERT INTO `doctor-information`.`appointment_schedule` (`doctor_id`,`chamb_id`,`patient_id`,`date`,`day`,`time`,`is_read`)
        VALUES (:doctor_id,:chamb_id,:patient_id,:date,:day,:time,:is_read)";
        $result1=$this->conn->prepare($query1);
        $result1->execute(array(':doctor_id'=>$this->doctor_id,':chamb_id'=>$this->chamb_id,':patient_id'=>$this->patient_id,':date'=>$this->date,':day'=>$this->day,':time'=>$this->time,':is_read'=>$this->is_read));

        $STH = $this->conn->query("SELECT schedule_id from `appointment_schedule` order by schedule_id desc limit 1");
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $last_id  = $STH->fetch();
        $last_inserted_schedule_id = $last_id->schedule_id;


        $query2="INSERT INTO `doctor-information`.`payment` (`payment_id`,`schedule_id`,`doctor_id`,`patient_id`,`transaction_id`,`date`,`amount`) 
VALUES (:payment_id,:schedule_id,:doctor_id,:patient_id,:transaction_id,:date,:amount)";


        $result2=$this->conn->prepare($query2);


        $result2->execute(array(':payment_id'=>$this->payment_id,':schedule_id'=>$last_inserted_schedule_id,':doctor_id'=>$this->doctor_id,':patient_id'=>$this->patient_id,':transaction_id'=>$this->transaction_id,':date'=>$this->date,':amount'=>$this->amount));


      //var_dump($result2);
        if ($result1||$result2) {
            Message::message("
                <div class=\"alert alert-success\">
                            <strong>Success!</strong> Thank you.We are currently processing your request.<br>
                                                    A confirmation SMS will be sent to you when you are done.
                </div>");
            return Utility::redirect('Profile/patient-profile.php');
        } else {
            Message::message("
                <div class=\"alert alert-danger\">
                            <strong>Failed!</strong> Data has not been stored successfully.
                </div>");
            return Utility::redirect('Profile/patient-profile.php');
        }

    }


    public function index($mode="ASSOC")
{

    $stat_date=date("Y-m-d");
    $end_date=date("Y-m-d", strtotime("+30 day"));
    $mode = strtoupper($mode);
    $STH = $this->conn->query("SELECT chamb_id,doctor_id,date,day,time from appointment_schedule WHERE date between '$stat_date' AND '$end_date'");
    // var_dump($STH);

    if ($mode == "OBJ")
        $STH->setFetchMode(PDO::FETCH_OBJ);
    else
        $STH->setFetchMode(PDO::FETCH_ASSOC);
    $allData = $STH->fetchAll();
    //  Utility::dd($allData);
    return $allData;
}

    public function view_report($mode="ASSOC")
    {
            if(isset($_POST['startdate'])) {
                $stat_date = $_POST['startdate'];
                $end_date = $_POST['enddate'];

            $mode = strtoupper($mode);
            $STH = $this->conn->query("SELECT doctors.visiting_fee,patient.name,appointment_schedule.date,appointment_schedule.day,appointment_schedule.time from appointment_schedule INNER join doctors INNER join patient WHERE appointment_schedule.is_read=1 AND appointment_schedule.doctor_id=doctors.id AND appointment_schedule.patient_id=patient.id AND date between '$stat_date' AND '$end_date' AND appointment_schedule.doctor_id=" . $_SESSION['dr_id']);
            // var_dump($STH);

            if ($mode == "OBJ")
                $STH->setFetchMode(PDO::FETCH_OBJ);
            else
                $STH->setFetchMode(PDO::FETCH_ASSOC);
            $allData = $STH->fetchAll();
            //  Utility::dd($allData);
            return $allData;
            }
        }


    public function payment_report($mode="ASSOC")
    {

         $mode = strtoupper($mode);
            $STH = $this->conn->query("SELECT doctors.visiting_fee,doctors.name as doctor_name,patient.name as patient_name,appointment_schedule.date,appointment_schedule.day,appointment_schedule.time from appointment_schedule INNER join doctors INNER join patient WHERE appointment_schedule.is_read=1 AND appointment_schedule.doctor_id=doctors.id AND appointment_schedule.patient_id=patient.id AND date between '$this->Startdate' AND '$this->Enddate'");
//             var_dump($STH);

            if ($mode == "OBJ")
                $STH->setFetchMode(PDO::FETCH_OBJ);
            else
                $STH->setFetchMode(PDO::FETCH_ASSOC);
            $allData = $STH->fetchAll();
            //  Utility::dd($allData);
            return $allData;

    }


    public function get_all_doctor($mode="ASSOC")
    {

        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT appointment_schedule.doctor_id ,doctors.name FROM `appointment_schedule` INNER join doctors WHERE appointment_schedule.doctor_id=doctors.id GROUP BY doctor_id ");
//             var_dump($STH);

        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $STH->fetchAll();
        //  Utility::dd($allData);
        return $allData;

    }

    public function get_patient($mode="ASSOC")
    {

        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT * FROM `appointment_schedule` WHERE patient_id=".$_SESSION['id']);
//          var_dump($STH);

        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $STH->fetchAll();
        //  Utility::dd($allData);
        return $allData;

    }

    public function individual_doctor_report($mode="ASSOC")
    {
        // echo $this->doctor_id;
       $_POST['Startdate']=$this->Startdate;
     $_POST['Enddate']= $this->Enddate;

            $mode = strtoupper($mode);
            $STH = $this->conn->query("SELECT doctors.visiting_fee,appointment_schedule.doctor_id,doctors.name as doctor_name,patient.name as patient_name,appointment_schedule.date,appointment_schedule.day,appointment_schedule.time from appointment_schedule INNER join doctors INNER join patient WHERE appointment_schedule.is_read=1 AND appointment_schedule.doctor_id=doctors.id AND appointment_schedule.patient_id=patient.id AND date between '$this->Startdate' AND '$this->Enddate'AND appointment_schedule.doctor_id=$this->doctor_id");
//var_dump($STH);

            if ($mode == "OBJ")
                $STH->setFetchMode(PDO::FETCH_OBJ);
            else
                $STH->setFetchMode(PDO::FETCH_ASSOC);
            $allData = $STH->fetchAll();
            //  Utility::dd($allData);
            return $allData;


    }


    public function manage_appointment_schedule($mode="ASSOC")
    {


        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT a.name as doctorname ,b.name as patientName ,b.phone as phone, d.chamber_name as chamberName ,c.schedule_id, c.date , c.day, c.time,c.is_read , e.amount , e.transaction_id FROM doctors a INNER JOIN patient b INNER JOIN appointment_schedule c INNER JOIN chambers d INNER JOIN payment e WHERE c.patient_id = b.id AND c.doctor_id = a.id AND c.chamb_id = d.chamb_id AND c.schedule_id = e.schedule_id  ");
       // var_dump($STH);

        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $STH->fetchAll();
        // Utility::dd($allData);
        return $allData;
    }


    public function doctor_view_patients($mode="ASSOC")
    {


        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT a.name as doctorname ,b.name as patientName , d.chamber_name as chamberName ,c.schedule_id, c.date,e.doctor_id ,c.patient_id, c.day, c.time,c.is_read , e.amount , e.transaction_id FROM doctors a INNER JOIN patient b INNER JOIN appointment_schedule c INNER JOIN chambers d INNER JOIN payment e WHERE c.patient_id = b.id AND c.doctor_id = a.id AND c.chamb_id = d.chamb_id AND c.schedule_id = e.schedule_id AND c.is_read=1 AND c.doctor_id=".$_SESSION['dr_id']);
         ///var_dump($STH);
        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $STH->fetchAll();
         //Utility::dd($allData);
       return $allData;
    }


    public function view_appointment($mode="ASSOC")
    {


        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT a.name as doctorname ,b.name as patientName , d.chamber_name as chamberName ,c.schedule_id, c.date,e.doctor_id ,c.patient_id, c.day, c.time,c.is_read , e.amount , e.transaction_id FROM doctors a INNER JOIN patient b INNER JOIN appointment_schedule c INNER JOIN chambers d INNER JOIN payment e WHERE c.patient_id = b.id AND c.doctor_id = a.id AND c.chamb_id = d.chamb_id AND c.schedule_id = e.schedule_id AND c.is_read=1 AND c.patient_id=".$_SESSION['id']);
        ///var_dump($STH);
        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $STH->fetchAll();
        //Utility::dd($allData);
        return $allData;
    }

    public function view($fetchMode="ASSOC"){

        $STH = $this->conn->query('SELECT * from payment where payment_id='.$this->payment_id);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        // Utility::dd($STH);
        $singleUser  = $STH->fetch();
        return $singleUser;

    }// end of view()




    public function count_appointment($fetchMode="ASSOC"){

        $STH = $this->conn->query("SELECT COUNT(schedule_id) AS schedule_id FROM appointment_schedule WHERE is_read=1");
        // Utility::dd($STH);
        $STH->setFetchMode(PDO::FETCH_OBJ);


        $singleUser  = $STH->fetch();
        return $singleUser;

    }// end of view()

    public function suggested_doctors($mode="ASSOC"){
$category=$_GET['category'];
$city=$_GET['city'];
$id=$_GET['id'];
        $mode = strtoupper($mode);
        $STH = $this->conn->query("SELECT 
       doctors.id,doctors.name,doctors.city,doctors.category,doctors.designation,doctors.pic,appointment_schedule.doctor_id , count(*) as dr FROM 
       appointment_schedule INNER join doctors WHERE doctors.category='".$category."' AND doctors.city='".$city."' AND doctors.id!='".$id."' AND
         appointment_schedule.is_read=1 AND 
       appointment_schedule.doctor_id=doctors.id  GROUP BY
         appointment_schedule.doctor_id ORDER BY count(*) DESC LIMIT 4");

        if ($mode == "OBJ")
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);
        $allData = $STH->fetchAll();
        //Utility::dd($allData);
        return $allData;

    }// end of view()




    public function update_is_read(){

        $query="UPDATE `doctor-information`.`appointment_schedule` SET `is_read`=:is_read
  WHERE `appointment_schedule`.`schedule_id` = ".$this->schedule_id;

        $result=$this->conn->prepare($query);
        // Utility::dd($result);

        $result->execute(array(':is_read'=>$this->is_read));
        //  Utility::dd($result);

        if($result){
            Message::message("
             <div class=\"alert alert-info\">
             <strong>Success!</strong> Appointment has been Marked as checked.
              </div>");
            //echo "suc";
        }
        else {
            echo "Error";
        }

        return Utility::redirect('manage_appointment_schedule.php');
    }




    public function delete(){

        $sqlQuery1 = "DELETE from `appointment_schedule` WHERE schedule_id =$this->schedule_id";

        $result1 = $this->conn->exec($sqlQuery1);
        $sqlQuery2 = "DELETE from `payment` WHERE schedule_id =$this->schedule_id";
        $result2 = $this->conn->exec($sqlQuery2);

        //  Utility::dd($$result);

        if($result1||$result2){
            Message::message("
             <div class=\"alert alert-danger\">
             <strong>Success!</strong> Appointment has been canceled.
              </div>");
        }
        else{
            Message::message("Error! Data has not been canceled.");

        }


    }// end of delete()

    public function auto_delete(){

        $sqlQuery1 = "DELETE from `appointment_schedule` WHERE schedule_id =$this->schedule_id";

        $result1 = $this->conn->exec($sqlQuery1);
        $sqlQuery2 = "DELETE from `payment` WHERE schedule_id =$this->schedule_id";
        $result2 = $this->conn->exec($sqlQuery2);

        //  Utility::dd($$result);

        if($result1||$result2){
            Message::message("
             <div class=\"alert alert-danger\">
             <strong>Success!</strong> Appointment has been canceled.
              </div>");
        }
        else{
            Message::message("Error! Data has not been canceled.");

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
        $sql = "SELECT appointment_schedule.date,appointment_schedule.day,appointment_schedule.time,payment.amount,payment.transaction_id FROM payment INNER JOIN appointment_schedule ON payment.schedule_id=appointment_schedule.schedule_id WHERE LIMIT $start ,$ItemsPerPage";
        $STH = $this->conn->query($sql);
       // var_dump($STH);
        $STH->setFetchMode(PDO::FETCH_OBJ);
        $arrAllData = $STH->fetchAll();
        //Utility::dd($arrAllData);
        //return $arrAllData;
    }

}

