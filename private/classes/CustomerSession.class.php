<?php

class CustomerSession {

    private $customer_id;

    public function __construct() {
        $this->check_stored_login();
    }

    public function login($customer) {
        if($customer) {
            session_regenerate_id();
            $_SESSION['customer_id'] = $customer->get_id();
            $this->customer_id = $customer->get_id();
        }
        return true;
    }

    public function is_logged_in() {
        return isset($this->customer_id);
    }

    public function logout() {
        unset($_SESSION['customer_id']);
        unset($this->customer_id);
        return true;
    }

    private function check_stored_login() {
        if(isset($_SESSION['customer_id'])) {
            $this->customer_id = $_SESSION['customer_id'];
        }
    }
}

?>
