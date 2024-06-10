<?php
require_once 'configs/cloudinaryConfig.php';
class DoctorModel  extends BaseModel {
    const ROLE = 'doctor';

    protected $connection = null;

    public function __construct() {
        $this->connection = $this->connect();
    }

    private function _query($sql){
        return mysqli_query($this->connection, $sql);
    }

    public function getById($id): array
    {
        $sql = "SELECT e.employee_id AS id,
                        e.name AS name,
                       e.username AS username,
                       e.avt AS avt,
                       e.gender AS gender,
                       e.dob AS dob,
                       e.email AS email,
                       e.phone AS phone,
                       e.address AS address,
                       e.status AS status,
                       e.specialty_id AS specialty_id,
                       p.name AS positionName
                FROM employees AS e
                JOIN positions AS p ON e.position_id = p.position_id
                WHERE e.employee_id = $id";

        $query = $this->_query($sql);
        return mysqli_fetch_assoc($query);
    }

    public function updateDoctor($doctor_id, $name, $dob, $email, $phone, $gender, $address, $specialty_id, $status, $avt): bool
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $updated_at = date("Y-m-d H:i:s");

        $sql = "UPDATE employees SET
                specialty_id = ?,
                name = ?,
                phone = ?,
                email = ?,
                dob = ?,
                gender = ?,
                address = ?, 
                status = ?,
                update_at = ?,
                avt = ?
            WHERE employee_id = ?";

        $stmt = mysqli_prepare($this->connection, $sql);
        if ($stmt === false) {
            throw new Exception('MySQL prepare error: ' . mysqli_error($this->connection));
        }

        mysqli_stmt_bind_param($stmt, 'issssisissi',
            $specialty_id, $name, $phone, $email, $dob, $gender,
            $address, $status, $updated_at, $avt, $doctor_id);

        $result = mysqli_stmt_execute($stmt);
        if ($result === false) {
            throw new Exception('Failed to execute statement: ' . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
        return $result;
    }

    public function addDoctor($name, $dob, $email, $phone,$gender, $address, $specialty_id, $status, $avt): bool
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $created_at = date("Y-m-d H:i:s");
        $hashedPassword = password_hash('Abc12345', PASSWORD_BCRYPT, ['cost' => 12]);
        $role_id = 2;
        $position_id = 1;
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
                       create_at,
                       avt)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($this->connection, $sql);
        if ($stmt === false) {
            throw new Exception('MySQL prepare error: ' . mysqli_error($this->connection));
        }

        mysqli_stmt_bind_param($stmt, 'iiisssssisiss',
            $specialty_id, $position_id, $role_id,$name, $hashedPassword, $phone, $email, $dob, $gender,
            $address, $status,$created_at, $avt);
        $result = mysqli_stmt_execute($stmt);
        if ($result === false) {
            throw new Exception('Failed to execute statement: ' . mysqli_stmt_error($stmt));
        }

        mysqli_stmt_close($stmt);
        return $result;
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

    public function getDoctorForAdmin(): array
    {
        $sql = "SELECT
                    e.employee_id AS id,
                    e.avt AS avt,
                    e.name AS name,
                    p.name AS position,
                    s.name AS specialty,
                    e.email AS email,
                    e.phone AS phone
                FROM employees AS e
                JOIN positions AS p ON e.position_id = p.position_id
                JOIN specialties AS s ON e.specialty_id = s.specialty_id
                JOIN roles AS r ON e.role_id = r.role_id
                WHERE r.role_name = LOWER('doctor') ORDER BY e.employee_id DESC";

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


}