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
}