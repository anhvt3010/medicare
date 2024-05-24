<?php
require_once 'BaseModel.php';
class AuthModel extends BaseModel {
    const TABLE_NAME = "patients";

    protected $connection = null;

    public function __construct() {
        $this->connection = $this->connect();
    }

    private function _query($sql){
        return mysqli_query($this->connection, $sql);
    }

    public function login($phone, $password): bool
    {
        $phone = mysqli_real_escape_string($this->connection, $phone);
        $password = mysqli_real_escape_string($this->connection, $password);

        $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE phone = '$phone'";

        $result = $this->_query($sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            // Giả sử mật khẩu được lưu dưới dạng băm
            if (password_verify($password, $user['password'])) {
                return true; // Đăng nhập thành công
            }
        }
        return false; // Đăng nhập thất bại
    }
    //    public function login($phone, $password): bool
//    {
//        if (session_status() == PHP_SESSION_NONE) {
//            session_start();
//        }
//
//        $phone = mysqli_real_escape_string($this->connection, $phone);
//
//        $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE phone = '$phone'";
//
//        $result = $this->_query($sql);
//        if ($result && mysqli_num_rows($result) > 0) {
//            $user = mysqli_fetch_assoc($result);
//            if (password_verify($password, $user['password'])) {
//                // Thiết lập các giá trị session
//                $_SESSION['user_id'] = $user['id'];
//                $_SESSION['user_name'] = $user['username'];
//                $_SESSION['user_phone'] = $phone;
//
//                return true;
//            }
//        }
//        return false;
//    }

    function logout() {
        // Khởi động session nếu chưa được khởi động
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Xóa tất cả các biến session
        $_SESSION = array();

        // Nếu sử dụng cookie để duy trì session, hãy xóa cookie đó
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Cuối cùng, hủy session
        session_destroy();

        // Chuyển hướng người dùng về trang đăng nhập hoặc trang chủ
        header("Location: index.php?controller=home&action=home");
        exit;
    }

}