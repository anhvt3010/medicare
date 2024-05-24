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

//    public function createAppointment(
//        $specialId, $doctorId, $dateSlot, $timeSlotId,
//        $patientName, $patientGender, $patientDob, $patientPhone, $patientEmail, $patientDescription){
//        $sql = "INSERT INTO appointments (
//                    specialty_id, employee_id, date_slot, time_id,
//                    patient_name, patient_gender, patient_dob, patient_phone, patient_email, patient_description,
//                    status, created_at)
//                VALUES (
//                    $specialId, $doctorId, $dateSlot, $timeSlotId,
//                    $patientName, $patientGender, $patientDob, $patientPhone, $patientEmail, $patientDescription,
//                    0, now()
//                )";
//        $result = $this->_query($sql);
//        if ($result && mysqli_affected_rows($this->connection) > 0) {
//            $message = "success";
//        } else {
//            $message = "failed";
//        }
//        return $message;
//    }

    public function createAppointment($specialId, $doctorId, $dateSlot, $timeSlotId, $patientName, $patientGender, $patientDob, $patientPhone, $patientEmail, $patientDescription) {
        // Lấy thời gian hiện tại
        $createdAt = date('Y-m-d H:i:s');  // Định dạng ngày giờ phù hợp với SQL

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