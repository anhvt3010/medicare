<?php
class EmployeeModel  extends BaseModel {
    const ROLE = 'employee';

    protected $connection = null;

    public function __construct() {
        $this->connection = $this->connect();
    }

    private function _query($sql){
        return mysqli_query($this->connection, $sql);
    }

    public function getEmployeeForAdmin(): array
    {
        $sql = "SELECT
                    e.employee_id AS id,
                    e.avt AS avt,
                    e.name AS name,
                    p.name AS position,
                    e.email AS email,
                    e.phone AS phone
                FROM employees AS e
                         JOIN positions AS p ON e.position_id = p.position_id
                         JOIN roles AS r ON e.role_id = r.role_id
                WHERE r.role_name = LOWER('employee')";

        $query = $this->_query($sql);
        $data = [];
        while ($result = mysqli_fetch_assoc($query)) {
            $data[] = $result;
        }
        return $data;
    }


}