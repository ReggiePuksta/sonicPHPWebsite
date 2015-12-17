<?php
class Location extends controller {
    public function index() {
        $searchEvents;

        if (isset($_GET['search'])) {
            $searchEvents = $this->model->searchEvents($_GET['search']);
        }
        // require the home view
        require(TEMPLATES_PATH . "head.php");
        require(TEMPLATES_PATH . "navigation.php");
        require APP . 'views/location.php';
        require TEMPLATES_PATH .'sidebar_other.php';
        require(TEMPLATES_PATH . "footer.php");
    }
}

