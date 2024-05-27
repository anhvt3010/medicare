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
}
