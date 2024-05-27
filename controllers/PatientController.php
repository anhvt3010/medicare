<?php
class PatientController extends BaseController
{
    private $patientModel;
    private $specialtyModel;

    public function __construct()
    {
        $this->loadModel('PatientModel');
        $this->patientModel = new PatientModel();

        $this->loadModel('SpecialtyModel');
        $this->specialtyModel = new SpecialtyModel();

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
}
