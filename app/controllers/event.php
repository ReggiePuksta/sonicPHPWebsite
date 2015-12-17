<?php
class Event extends controller {
    public function index() {
    }
    public function second($param) {
        $searchEvents;
        if (isset($_GET['search'])) {
            $searchEvents = $this->model->searchEvents($_GET['search']);
        }
        $rows=$this->model->getEventById($param); 
        // require the home view
        require(TEMPLATES_PATH . "head.php");
        require APP . 'views/_event.php';
    }
}
