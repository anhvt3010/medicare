<?php
    class LoginController  extends BaseController{
        public function login() {
            return $this->view('client.login', [
            ]);
        }

        public function register() {
            return include './views/client/register.php';
        }
    }
