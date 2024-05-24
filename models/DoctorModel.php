<?php
class DoctorModel  extends BaseModel {
    const TABLE_NAME = 'employees';

    protected $connection = null;

    public function __construct() {
        $this->connection = $this->connect();
    }

    private function _query($sql){
        return mysqli_query($this->connection, $sql);
    }

    public function getAll($select = ['*'], $orderBy = ['name' => 'desc']): array
    {
        return $this->findAll(self::TABLE_NAME, $select, $orderBy);
    }

    public function getById($id): array
    {
        return $this->findById(self::TABLE_NAME, $id);
    }

    public function getDoctorForHome(): array
    {
        $sql = "SELECT e.employee_id, e.name as doctorName, e.avt, s.name as specialtyName
                FROM employees AS e
                JOIN specialties AS s ON e.specialty_id = s.specialty_id
                JOIN roles AS r ON r.role_id = e.role_id
                WHERE r.role_name = 'doctor'
                LIMIT 4";

        $query = $this->_query($sql);
        $data = [];
        while ($result = mysqli_fetch_assoc($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public function getCountDoctors(): array
    {
        $sql = "SELECT count(*)
                FROM employees AS e
                JOIN roles AS r ON r.role_id = e.role_id
                WHERE r.role_name = 'doctor'";

        $query = $this->_query($sql);
        $data = [];
        while ($result = mysqli_fetch_assoc($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public function getDoctorsBySpecialty($specialty): array
    {
        $sql = "SELECT e.employee_id, e.name
                FROM employees AS e
                JOIN specialties AS s ON e.specialty_id = s.specialty_id
                JOIN roles AS r ON r.role_id = e.role_id
                WHERE r.role_name = 'doctor' AND s.specialty_id = $specialty";

        $query = $this->_query($sql);
        $data = [];
        while ($result = mysqli_fetch_assoc($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public function add($data){
        $this->create(self::TABLE_NAME, $data);
    }

    public function updateData($id, $data)
    {
        $this->update(self::TABLE_NAME, $id, $data);
    }

    public function delete($table, $id)
    {
        return __METHOD__;
    }
}