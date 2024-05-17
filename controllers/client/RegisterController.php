<?php
class RegisterController {
    public function register() {
        echo __METHOD__;
    }
    public function login() {
        return include './views/client/login.php';
    }
}
