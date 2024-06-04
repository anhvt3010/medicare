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
                WHERE r.role_name = LOWER('employee') ORDER BY e.employee_id DESC";

        $query = $this->_query($sql);
        $data = [];
        while ($result = mysqli_fetch_assoc($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public function addEmployee($name, $dob, $email, $phone,$gender, $address, $specialty_id, $position_id, $status): bool
    {
        $created_at = date("Y-m-d H:i:s");
        $hashedPassword = password_hash('Abc12345', PASSWORD_BCRYPT, ['cost' => 12]);
        $role_id = 1;
        $sql = "INSERT INTO employees (
                       specialty_id,
                       position_id,
                       role_id,
                       name,
                       password,
                       phone,
                       email,
                       dob,
                       gender,
                       address, 
                       status,
                       create_at)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($this->connection, $sql);
        if ($stmt === false) {
            throw new Exception('MySQL prepare error: ' . mysqli_error($this->connection));
        }

        mysqli_stmt_bind_param($stmt, 'iiisssssisis',
            $specialty_id, $position_id, $role_id,$name, $hashedPassword, $phone, $email, $dob, $gender,
            $address, $status,$created_at);
        $result = mysqli_stmt_execute($stmt);
        if ($result === false) {
            throw new Exception('Failed to execute statement: ' . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
        return $result;
    }
}