<?php
class DoctorController extends BaseController {
    private $doctorModel;
    private $specialtyModel;

    public function __construct()
    {
        $this->loadModel('DoctorModel');
        $this->doctorModel = new DoctorModel();

        $this->loadModel('SpecialtyModel');
        $this->specialtyModel = new SpecialtyModel();
    }

    public function index()
    {
        $listDoctors = $this->doctorModel->getDoctorForAdmin();
        $listSpecialties = $this->specialtyModel->getSpecialtiesForAppointment();
        return $this->view('admin.doctors', [
            'listDoctors' => $listDoctors,
            'listSpecialties' => $listSpecialties,
        ]);
    }
}
