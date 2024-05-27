<?php
require_once 'BaseController.php';
class AppointmentController extends BaseController
{
    private $timeSlotModel;
    private $appointmentModel;
    private $doctorModel;
    private $specialtyModel;

    public function __construct()
    {
        $this->loadModel('TimeSlotModel');
        $this->timeSlotModel = new TimeSlotModel();

        $this->loadModel('AppointmentModel');
        $this->appointmentModel = new AppointmentModel();

        $this->loadModel('DoctorModel');
        $this->doctorModel = new DoctorModel();

        $this->loadModel('SpecialtyModel');
        $this->specialtyModel = new SpecialtyModel();
    }

    public function getByDateAndDoctor()
    {
        $date_slot = isset($_GET['dateSlot']) ? $_GET['dateSlot'] : null;
        $doctorId = isset($_GET['doctorId']) ? $_GET['doctorId'] : null;
        $listTimeSlot = $this->timeSlotModel->getByDateAndDoctor($date_slot, $doctorId);
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            header('Content-Type: application/json');
            echo json_encode($listTimeSlot);
            exit;
        } else {
            return $this->view('test', [
                'listTimeSlot' => $listTimeSlot
            ]);
        }
    }

    public function create(){
        $specialId = intval($_POST['specialId']);
        $doctorId = intval($_POST['doctorId']);
        $dateSlot = intval($_POST['dateSlot']);
        $timeSlotId = intval($_POST['timeSlotId']);
        $patientName = $_POST['patientName'];
        $patientGender = intval($_POST['patientGender']);
        $patientDob = $_POST['patientDob'];
        $patientPhone = $_POST['patientPhone'];
        $patientEmail = $_POST['patientEmail'];
        $patientDescription = $_POST['patientDescription'];
        $appointment = $this->appointmentModel->createAppointment(
            $specialId, $doctorId, $dateSlot, $timeSlotId,
            $patientName, $patientGender, $patientDob, $patientPhone, $patientEmail, $patientDescription);
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            header('Content-Type: application/json');
            echo json_encode($appointment);
            exit;
        } else {
            return $this->view('test', [
                'message' => $appointment
            ]);
        }
    }

    public function homeAdmin(){
        $listSpecialties = $this->specialtyModel->getSpecialtiesForAdmin();
        $listDoctors = $this->doctorModel->getDoctorForAdmin();
        $listAppointments = $this->appointmentModel->getAllForAdmin();
        return $this->view('admin.appointments', [
            'listAppointments' => $listAppointments,
            'listSpecialties' => $listSpecialties,
            'listDoctors' => $listDoctors,
        ]);
    }
    public function test($date_slot = 19865, $doctorId = 1){
        $listTimeSlot = $this->timeSlotModel->getByDateAndDoctor($date_slot, $doctorId);
        return $this->view('test', [
            'listTimeSlot' => $listTimeSlot
        ]);
    }
}