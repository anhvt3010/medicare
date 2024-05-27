<?php
class PatientModel extends BaseModel {

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


}