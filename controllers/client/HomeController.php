<?php
class HomeController extends BaseController{
    private $doctorModel;
    private $specialtyModel;
    public function __construct(){
        $this->loadModel('DoctorModel');
        $this->doctorModel = new DoctorModel();

        $this->loadModel('SpecialtyModel');
        $this->specialtyModel = new SpecialtyModel();
    }

    public function home() {
        $listDoctors = $this->doctorModel->getDoctorForHome();
        return $this->view('client.home', [
            'listDoctors' => $listDoctors
        ]);
    }
    public function login() {
        return $this->view('client.login');
    }

    public function appointment() {
        $listSpecialties = $this->specialtyModel->getSpecialtiesForAppointment();
        $listDoctorsBySpecialty = $this->doctorModel->getDoctorsBySpecialty(1);
        return $this->view('client.appointment', [
            'listSpecialties' => $listSpecialties,
            'listDoctorsBySpecialty' => $listDoctorsBySpecialty
        ]);
    }

    public function update() {
        $id = $_GET['id'];

        $data = [
            'ten' => 'Doctor 18'
        ];
//        $this->doctorModel->updateData($id, $data);
        return $this->view('test',[
//            'message' => $message
        ]);
    }

    public function test() {
        $data = [
            'ten' => 'Doctor 1'
        ];
//        $message = $this->doctorModel->add($data);
        return $this->view('test',[
        ]);
    }
}