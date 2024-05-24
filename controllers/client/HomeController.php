<?php

class HomeController extends BaseController
{
    private $doctorModel;
    private $specialtyModel;
    private $authModel;

    public function __construct()
    {
        $this->loadModel('DoctorModel');
        $this->doctorModel = new DoctorModel();

        $this->loadModel('SpecialtyModel');
        $this->specialtyModel = new SpecialtyModel();

        $this->loadModel('AuthModel');
        $this->authModel = new AuthModel();
    }

    public function home()
    {
        $countDoctors = $this->doctorModel->getCountDoctors();
        $listDoctors = $this->doctorModel->getDoctorForHome();
        return $this->view('client.home', [
            'listDoctors' => $listDoctors,
            'countDoctors' => $countDoctors,
        ]);
    }

    public function login()
    {
        return $this->view('client.login');
    }

    public function appointment($specialtyId = null)
    {
        $listSpecialties = $this->specialtyModel->getSpecialtiesForAppointment();
        $listDoctorsBySpecialty = [];
        if ($specialtyId !== null) {
            $listDoctorsBySpecialty = $this->doctorModel->getDoctorsBySpecialty($specialtyId);
        }
        // Kiểm tra xem yêu cầu có phải là AJAX hay không
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            // Nếu là AJAX, chỉ trả về JSON của listDoctorsBySpecialty
            header('Content-Type: application/json');
            echo json_encode($listDoctorsBySpecialty);
            exit;
        } else {
            // Nếu không phải AJAX, trả về view như bình thường
            return $this->view('client.appointment', [
                'listSpecialties' => $listSpecialties,
                'listDoctorsBySpecialty' => $listDoctorsBySpecialty
            ]);
        }
    }

    public function getDoctor()
    {
        $specialtyId = isset($_GET['specialtyId']) ? $_GET['specialtyId'] : null;
        $listDoctorsBySpecialty = $this->doctorModel->getDoctorsBySpecialty($specialtyId);
        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            header('Content-Type: application/json');
            echo json_encode($listDoctorsBySpecialty);
            exit;
        } else {
            return $this->view('test', [
                'listDoctorsBySpecialty' => $listDoctorsBySpecialty
            ]);
        }
    }

    public function update()
    {
        $id = $_GET['id'];

        $data = [
            'ten' => 'Doctor 18'
        ];
//        $this->doctorModel->updateData($id, $data);
        return $this->view('test', [
//            'message' => $message
        ]);
    }

    public function test()
    {
        $countDoctors = $this->doctorModel->getCountDoctors();
        return $this->view('test', [
            'countDoctors' => $countDoctors,
        ]);
    }



    public function logout()
    {
        $this->authModel->logout();
        return $this->view('test', [
        ]);
    }
}