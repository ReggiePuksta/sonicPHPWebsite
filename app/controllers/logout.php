<?php
class Logout extends controller {
    public function index() {
        unset($_SESSION ['valid_user']);
        require(TEMPLATES_PATH . "head.php");
        require APP . 'views/logout.php';
    }

}
