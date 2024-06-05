<?php
// Thiết lập thời gian tồn tại của cookie và session
session_set_cookie_params(86400);
ini_set('session.gc_maxlifetime', 86400);

// Khởi động session
session_start();
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

        $sql = "SELECT * FROM patients WHERE phone = '$phone'";

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

    public function loginAdmin($phone, $password): string
    {
        $phone = mysqli_real_escape_string($this->connection, $phone);
        $password = mysqli_real_escape_string($this->connection, $password);

        $sql = "SELECT * FROM employees WHERE phone = '$phone'";
        $result = $this->_query($sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $admin = mysqli_fetch_assoc($result);
            // Giả sử mật khẩu được lưu dưới dạng băm
            if (password_verify($password, $admin['password'])) {
                // Lưu thông tin vào session
                $_SESSION['admin_phone'] = $admin['phone'];
                $_SESSION['role_id'] = $admin['role_id'];
                $_SESSION['admin_name'] = $admin['name'];
                $_SESSION['admin_avt'] = $admin['avt'];
                return json_encode([
                    'success' => true,
                    'sessionData' => [
                        'admin_phone' => $_SESSION['admin_phone'],
                        'role_id' => $_SESSION['role_id'],
                        'admin_name' => $_SESSION['admin_name']
                    ]
                ]);
            } else {
                return json_encode(['success' => false, 'message' => 'Số điện thoại hoặc mật khẩu không đúng']);
            }
        }
        return json_encode(['success' => false, 'message' => 'Không tìm thấy tài khoản']);
    }

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