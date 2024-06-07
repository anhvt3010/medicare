<?php
class PatientController extends BaseController
{
    private $patientModel;
    private $specialtyModel;
    private $appointmentModel;

    public function __construct()
    {
        $this->loadModel('PatientModel');
        $this->patientModel = new PatientModel();

        $this->loadModel('SpecialtyModel');
        $this->specialtyModel = new SpecialtyModel();

        $this->loadModel('AppointmentModel');
        $this->appointmentModel = new AppointmentModel();

    }

    public function index()
    {
        $listSpecialties = $this->specialtyModel->getSpecialtiesForAdmin();
        $listPatients = $this->patientModel->getPatientForAdmin();
        return $this->view('admin.patients', [
            'listPatients' => $listPatients,
            'listSpecialties' => $listSpecialties,
        ]);
    }

    public function profile()
    {
        session_start();
        if (isset($_SESSION['user_phone'])) {
            $phone = $_SESSION['user_phone'];
            $patient = $this->patientModel->findByPhone($phone);
            return $this->view('client.profile', [
                'patient' => $patient,
            ]);
        } else {
            header('Location: http://localhost/Medicare/index.php?controller=home&action=not_found');
            exit();
        }
    }

    public function detail()
    {
        $id = $_GET['patient_id'] ?? null;
        $patient = $this->patientModel->findById($id);
        return $this->view('admin.patient-detail', [
            'patient' => $patient,
        ]);
    }

    public function update_information()
    {
        session_start();
        if (isset($_SESSION['user_phone'])) {
            $name = $_POST['name'];
            $gender = $_POST['gender'];
            $dob = $_POST['dob'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone = $_SESSION['user_phone'];
            $result = $this->patientModel->updatePatient($name, $gender, $dob, $email, $address, $phone);
            if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
                header('Content-Type: application/json');
                echo json_encode($result);
                exit;
            } else {
                return $this->view('client.profile', [
                    'result' => $result,
                ]);
            }
        } else {
            header('http://localhost/Medicare/index.php?controller=home&action=login');
            exit();
        }
    }

    public function history()
    {
        session_start();
        if (isset($_SESSION['user_phone'])) {
            $phone = $_SESSION['user_phone'];
            $listAppointments = $this->appointmentModel->getAppointmentsByPhone($phone);
            return $this->view('client.history', [
                'listAppointments' => $listAppointments,
            ]);
        } else {
            header('Location: http://localhost/Medicare/index.php?controller=home&action=not_found');
            exit();
        }
    }
}
