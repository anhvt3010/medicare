<?php
class SpecialtyController extends BaseController
{
    private $specialtyModel;

    public function __construct()
    {
        $this->loadModel('SpecialtyModel');
        $this->specialtyModel = new SpecialtyModel();
    }

    public function index()
    {
        $listSpecialties = $this->specialtyModel->getSpecialtiesForAdmin();
        return $this->view('admin.specialties', [
            'listSpecialties' => $listSpecialties,
        ]);
    }

    public function add()
    {
        $specialtyName = $_GET['specialtyName'];
        $specialtyDescription = $_GET['specialtyDescription'];
        $specialtyStatus = $_GET['specialtyStatus'];

        $specialty = $this->specialtyModel->addSpecialty($specialtyName, $specialtyDescription, $specialtyStatus);
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            header('Content-Type: application/json');
            echo json_encode($specialty);
            exit;
        }
        return $this->view('admin.specialties', [
            'specialty' => $specialty,
        ]);
    }

    public function get_one()
    {
        $specialty_id = $_GET['specialtyId'] ?? '';
        $specialty = $this->specialtyModel->getById($specialty_id);
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            header('Content-Type: application/json');
            echo json_encode($specialty);
            exit;
        }
        return $this->view('admin.specialty-detail', [
            'specialty' => $specialty,
        ]);
    }

    public function update()
    {
        $specialty_id = $_GET['specialtyId'];
        $specialtyName = $_GET['specialtyName'];
        $specialtyDescription = $_GET['specialtyDescription'];
        $specialtyStatus = $_GET['specialtyStatus'];

        $specialty = $this->specialtyModel->updateSpecialtyById($specialty_id, $specialtyName, $specialtyDescription, $specialtyStatus);
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            header('Content-Type: application/json');
            echo json_encode($specialty);
            exit;
        }
        return $this->view('admin.specialty-detail', [
            'specialty' => $specialty,
        ]);
    }
}
