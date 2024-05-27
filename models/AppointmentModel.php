<?php
require_once __DIR__ . '/../core/Database.php';
class AppointmentModel extends Database {
    protected $connection = null;

    public function __construct() {
        $this->connection = $this->connect();
    }

    private function _query($sql){
        return mysqli_query($this->connection, $sql);
    }

    public function getAllForAdmin(){
        $sql = "SELECT e.name AS doctor_name,
                       e.avt AS doctor_avt,
                       a.patient_name AS patient_name,
                       a.patient_dob AS patient_dob,
                       a.patient_gender AS patient_gender,
                       a.patient_phone AS patient_phone,
                       a.patient_email AS patient_email,
                       s.name AS specialty_name,
                       a.date_slot AS date_slot,
                       ts.slot_time AS time_slot,
                       a.status AS status
                FROM appointments AS a
                JOIN employees AS e ON e.employee_id = a.employee_id
                JOIN roles AS r ON r.role_id = e.role_id
                JOIN time_slots AS ts ON ts.time_id = a.time_id
                JOIN specialties AS S ON s.specialty_id = a.specialty_id
                WHERE r.role_name =  LOWER('doctor')
                ORDER BY a.created_at DESC ";
        $query = $this->_query($sql);
        $data = [];
        while ($result = mysqli_fetch_assoc($query)) {
            $data[] = $result;
        }
        return $data;
    }

    public function createAppointment($specialId, $doctorId, $dateSlot, $timeSlotId, $patientName, $patientGender, $patientDob, $patientPhone, $patientEmail, $patientDescription) {
        // Lấy thời gian hiện tại
        $createdAt = date('Y-m-d H:i:s');

        $sql = "INSERT INTO appointments (
                specialty_id, employee_id, date_slot, time_id,
                patient_name, patient_gender, patient_dob, patient_phone, patient_email, patient_description,
                status, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $this->connection->error);
        }

        // Thêm trạng thái và ngày tạo vào bind_param
        $status = 0;  // Giả sử trạng thái mặc định là 0
        $stmt->bind_param("iiiissssssis", $specialId, $doctorId, $dateSlot, $timeSlotId,
            $patientName, $patientGender, $patientDob, $patientPhone, $patientEmail, $patientDescription,
            $status, $createdAt);

        $stmt->execute();
        if ($stmt->error) {
            throw new Exception("Execute failed: " . $stmt->error);
        }
        return $stmt->insert_id; // Trả về ID của bản ghi mới được chèn
    }




}