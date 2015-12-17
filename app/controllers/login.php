<?php
class Login extends controller {
    public function index() {
        $searchEvents;

        if (isset($_GET['search'])) {
            $searchEvents = $this->model->searchEvents($_GET['search']);
        }
        // require the home view
        require(TEMPLATES_PATH . "head.php");
        require APP . 'views/login.php';
    }
}
