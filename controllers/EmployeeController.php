<?php
class EmployeeController extends BaseController {
    private $employeeModel;
    private $specialtyModel;
    private $positionModel;

    public function __construct()
    {
        $this->loadModel('EmployeeModel');
        $this->employeeModel = new EmployeeModel();

        $this->loadModel('PositionModel');
        $this->positionModel = new PositionModel();

        $this->loadModel('SpecialtyModel');
        $this->specialtyModel = new SpecialtyModel();
    }

    public function index()
    {
        $listEmployees = $this->employeeModel->getEmployeeForAdmin();
        $listPositions = $this->positionModel->getAll();
        $listSpecialties = $this->specialtyModel->getSpecialtiesForAppointment();
        return $this->view('admin.employees', [
            'listEmployees' => $listEmployees,
            'listPositions' => $listPositions,
            'listSpecialties' => $listSpecialties,
        ]);
    }

    /**
     * @throws Exception
     */
    public function add()
    {
        $specialty_id = $_POST['specialty_id'];
        $position_id = $_POST['position_id'];
        $name = $_POST['name'];
        $phone  = $_POST['phone'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $address  = $_POST['address'];
        $status  = $_POST['status'];

        $result = $this->employeeModel->addEmployee($name,$dob, $email, $phone, $gender, $address, $specialty_id, $position_id, $status);
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            header('Content-Type: application/json');
            echo json_encode($result);
            exit;
        }
        return $this->view('test', [
            'result' => $result,
        ]);
    }

}
