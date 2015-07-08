<?php
class Myevents extends controller {
    public function index() {
        if (isset($_SESSION['valid_user'])) {
            $userEventData = 
                $this->model->getUserEvents($_SESSION['valid_user']);
        }
        require(TEMPLATES_PATH . "head.php");
        require APP . 'views/myevents.php';
    }

    public function delete() {
        if (isset($_SESSION['valid_user'])) {
            $userEventData = 
                $this->model->deleteUserEvent($_SESSION['orderss']);
        }
        require(TEMPLATES_PATH . "head.php");
        require APP . 'views/delete.php';
    }
}
