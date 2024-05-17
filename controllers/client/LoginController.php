<?php
    class LoginController {
        public function login() {
            echo ('ahihi');
        }
        public function register() {
            return include './views/client/register.php';
        }
    }
