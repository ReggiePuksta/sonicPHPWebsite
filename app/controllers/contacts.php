<?php
class Contacts extends controller {
    public function index() {
        $searchEvents;

        if (isset($_GET['search'])) {
            $searchEvents = $this->model->searchEvents($_GET['search']);
        }
        require(TEMPLATES_PATH . "head.php");
        require(TEMPLATES_PATH . "navigation.php");
        // require the home view
        require APP . 'views/contacts.php';
        require TEMPLATES_PATH .'sidebar_other.php';
        require_once(TEMPLATES_PATH . "footer.php");
    }
}
