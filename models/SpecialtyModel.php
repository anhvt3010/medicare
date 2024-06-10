<?php
class SpecialtyModel extends Database{
    const TABLE_NAME = 'specialties';

    protected $connection = null;

    public function __construct() {
        $this->connection = $this->connect();
    }

    private function _query($sql){
        return mysqli_query($this->connection, $sql);
    }

    public function addSpecialty($name, $description, $status) {
        $name = mysqli_real_escape_string($this->connection, $name);
        $description = mysqli_real_escape_string($this->connection, $description);
        $status = mysqli_real_escape_string($this->connection, $status);
        $created_at = date("Y-m-d H:i:s");

        $sql = "INSERT INTO specialties (name, description, status, create_at) VALUES ('$name', '$description', '$status', '$created_at')";

        return $this->_query($sql);
    }

    public function updateSpecialtyById($specialty_id, $specialtyName, $specialtyDescription, $specialtyStatus): mysqli_result|bool
    {
        $specialtyName = mysqli_real_escape_string($this->connection, $specialtyName);
        $specialtyDescription = mysqli_real_escape_string($this->connection, $specialtyDescription);
        $specialtyStatus = mysqli_real_escape_string($this->connection, $specialtyStatus);

        $sql = "UPDATE specialties SET 
                name = '{$specialtyName}', 
                description = '{$specialtyDescription}', 
                status = '{$specialtyStatus}', 
                update_at = NOW()
                WHERE specialty_id = {$specialty_id}";
        return $this->_query($sql);
    }

    public function getSpecialtiesForAppointment(): array
    {
        $sql = "SELECT *
            FROM specialties
            WHERE status = 1";

        $query = $this->_query($sql);
        $data = [];
        while ($result = mysqli_fetch_assoc($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public function getSpecialtiesForAdmin(): array
    {
        $sql = "SELECT *
            FROM specialties ORDER BY create_at desc";

        $query = $this->_query($sql);
        $data = [];
        while ($result = mysqli_fetch_assoc($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public function getById($specialty_id): array
    {
        $sql = "SELECT *
            FROM specialties WHERE specialty_id = {$specialty_id}";

        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
    }
}