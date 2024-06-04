<?php
class PatientModel extends Database {
    protected $connection = null;

    public function __construct() {
        $this->connection = $this->connect();
    }

    private function _query($sql){
        return mysqli_query($this->connection, $sql);
    }

    public function getPatientForAdmin(): array
    {
        $sql = "SELECT patient_id, name, username, dob, gender, address, phone, email
                FROM patients";
        $query = $this->_query($sql);
        $data = [];
        while ($result = mysqli_fetch_assoc($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public function findById($id): array
    {
        $sql = "SELECT p.patient_id,
                       p.name AS name,
                       p.email AS email,
                       p.phone AS phone,
                       p.gender AS gender,
                       p.dob AS dob,
                       p.address AS address,
                        p.status AS status
                FROM patients AS p WHERE p.patient_id = {$id}";
        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
    }


}