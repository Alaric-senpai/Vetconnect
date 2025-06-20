<?php

require_once __DIR__ . '/../helpers/AuthHelper.php';
require_once __DIR__ .'/../models/Appointments.php';

use App\Models\Appointment\Appointment;

class AppointmentController {

    public function __construct() {
        require_login(); 
    }


    public function showNewAppointmentPage() {
        require_once __DIR__ .'/../views/newappointment.php';
    }

    public function saveAppointment(){
        $appointment = new Appointment();
        $data  = [
            'name'=> $_POST['name'],
            'date'=> $_POST['date'],
            'reason'=> $_POST['reason'],
            'pet'=> $_POST['pet'],
        ];



        $save =$appointment->create($data);

        if($save){
            $_SESSION['flash']="Appointment  registered wait for booking please";
            $_SESSION["success"]= true;
        }else{
            $_SESSION["flash"]= "Appointment error detected";
            $_SESSION["success"]= false;
        }

        header("location: ?page=dashboard");
        exit;
    }

    public function updateAppointmentStatus(){
        $appointment = new Appointment();
        $data = [
            "id"=> $_POST["appointment_id"],
            "status"=> $_POST["status"],
        ];

        $save =$appointment->setStatus( $data['id'], $data['status'] );

        if($save){
            $_SESSION['flash']="Appointment status set to {$data['status'] } succesfully";
            $_SESSION["success"]= true;
        }else{
            $_SESSION["flash"]= " error detected when updating status";
            $_SESSION["success"]= false;
        }

        header("location: ?page=dashboard");
        exit;
    }
        public function assignVet(){
        $appointment = new Appointment();
        $data = [
            "id"=> $_POST["appointment_id"],
            "vet"=> $_POST["vet"],
        ];


        $save =$appointment->assignVet( $data['id'], $data['vet'] );

        if($save){
            $_SESSION['flash']="Appointment had been assigned a doctor successfully";
            $_SESSION["success"]= true;
        }else{
            $_SESSION["flash"]= " error detected when assigning a doctor";
            $_SESSION["success"]= false;
        }

        header("location: ?page=dashboard");
        exit;
    }
}
