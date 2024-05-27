<?php
class EmployeeController extends BaseController {
    private $employeeModel;
    private $specialtyModel;

    public function __construct()
    {
        $this->loadModel('EmployeeModel');
        $this->employeeModel = new EmployeeModel();

//        $this->loadModel('SpecialtyModel');
//        $this->specialtyModel = new SpecialtyModel();
    }

    public function index()
    {
        $listEmployees = $this->employeeModel->getEmployeeForAdmin();
//        $listSpecialties = $this->specialtyModel->getSpecialtiesForAppointment();
        return $this->view('admin.employees', [
            'listEmployees' => $listEmployees,
//            'listSpecialties' => $listSpecialties,
        ]);
    }
}
