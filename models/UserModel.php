<?php
require_once 'BaseModel.php';
class UserModel extends BaseModel {
    const TABLE_NAME = "patients";

    protected $connection = null;

    public function __construct() {
        $this->connection = $this->connect();
    }

    private function _query($sql){
        return mysqli_query($this->connection, $sql);
    }

    public function checkPhoneExists($phone) {
        $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE phone = '" . mysqli_real_escape_string($this->connection, $phone) . "'";
        $result = $this->_query($sql);
        return mysqli_num_rows($result) > 0;
    }


    function register($name, $phone, $password) {
        // Mã hóa mật khẩu
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

        // Lưu người dùng vào cơ sở dữ liệu
        $sql = "INSERT INTO " . self::TABLE_NAME . "(name, phone, password) VALUES (?, ?, ?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("sss", $name, $phone, $hashedPassword);
        $stmt->execute();
        $stmt->close();
    }
}