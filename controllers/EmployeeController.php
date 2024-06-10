<?php
require 'configs/cloudinaryConfig.php';
class EmployeeController extends BaseController {
    private EmployeeModel $employeeModel;
    private SpecialtyModel $specialtyModel;
    private PositionModel $positionModel;

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
//            'listSpecialties' => $listSpecialties,
        ]);
    }

    /**
     * @throws Exception
     */
    public function add()
    {
        $position_id = $_POST['position_id'];
        $name = $_POST['name'];
        $phone  = $_POST['phone'];
        $email = $_POST['email'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $address  = $_POST['address'];
        $status  = $_POST['status'];

        // Xử lý upload ảnh đại diện
        if (isset($_FILES['avt']) && $_FILES['avt']['error'] == 0) {
            $avt = $this->uploadImageToCloudinary($this->escapeBackslashes($_FILES['avt']['tmp_name']));
        } else {
            $avt = 'http://localhost/Medicare/assets/img/doctors/doctor_default.png';
        }

        $result = $this->employeeModel->addEmployee($name,$dob, $email, $phone, $gender, $address, $position_id, $status, $avt);
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            header('Content-Type: application/json');
            echo json_encode($result);
            exit;
        }
        return $this->view('test', [
            'result' => $result,
        ]);
    }

    public function uploadImageToCloudinary($imagePath): string
    {
        try {
            // Truy cập đối tượng Cloudinary từ biến toàn cục
            $cloudinary = $GLOBALS['cloudinary'];

            // Upload ảnh lên Cloudinary sử dụng đối tượng Cloudinary
            $result = $cloudinary->uploadApi()->upload($imagePath);

            // Trả về URL an toàn của ảnh đã upload
            return $result['secure_url'];
        } catch (Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    private function escapeBackslashes($string): array|string
    {
        return str_replace("\\", "\\\\", $string);
    }

}
