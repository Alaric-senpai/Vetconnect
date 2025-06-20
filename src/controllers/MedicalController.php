<?php


require_once __DIR__ ."/../helpers/AuthHelper.php";
require_once __DIR__ ."/../helpers/RoleHeplet.php";

require_once __DIR__ ."/../models/MedicalReport.php";

use App\Models\MedicalReport\MedicalReport;

class MedicalController {


    public function __construct() {
        require_login();        
    }

    public function showAddMedicalReport($appointment){
        $_SESSION["appid"] = $appointment;
        require_once    __DIR__ ."/../views/addmedicalrecord.php";
    }

    public function saveMedicalReport(){
        $report = new MedicalReport();
        $data = [
            "pet_id"=> $_POST["pet_id"],
            "vet_id"=> $_POST["vet_id"],
            "visit_date"=> $_POST["visit_date"],
            "diagnosis"=> $_POST["diagnosis"],
            "treatment"=> $_POST["treatment"],
            "notes"=> $_POST["notes"]
        ];


        $save = $report->save($data);


        if($save){
            $_SESSION['flash']="Report saved successfully";
            $_SESSION['success']=true;
        }else{
            $_SESSION['flash']= 'Error saving medical report';
            $_SESSION['success']= false;
        }

        header("location: ?page=dashboard");

    }

    public function viewMedicalReport($areport){
        $_SESSION["medreport"] = $areport;
        require_once __DIR__ . "/../views/medicalreport.php";
    }

    public function showPetsMedicalRecords($pet){
        $_SESSION["pet_id"] = $pet;
        require_once __DIR__ . "/../views/petmedicalrecords.php";
    }

}
