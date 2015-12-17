<?php
class Registration  extends Controller {
    public function index() {
        // Sidebar input search for events
        $inputsValidated = false;
        $userNameExists = false;
        $searchEvents;
        // Create Sidebar Search Query
        if (isset($_GET['search'])) {
            $searchEvents = $this->model->searchEvents($_GET['search']);
        }
        // Check if User Name against the database if it exists
        if (isset($_POST['form_nickname'])) {
            $userNameExists = $this->model->checkUserNameExists($_POST['form_nickname']);
            if (!$userNameExists) {
                If (!empty($_POST['form_nickname']) && !empty($_POST['form_password'])
                    && !empty($_POST['form_firstname']) && !empty($_POST['form_lastname'])
                    && isset($_POST['submit'])) {
                        $this->model->createUser($_POST['form_nickname'],
                            $_POST['form_password'], $_POST['form_firstname'],
                            $_POST['form_lastname'], $_POST['form_email']);
                        $inputsValidated = true;
                    }
            }
        }
        // Check if all required POST inputs are filled in and
        // create a User
        // Require the home view
        require(TEMPLATES_PATH . "head.php");
        require(TEMPLATES_PATH . "navigation.php");
        require APP . 'views/registration.php';
        require TEMPLATES_PATH .'sidebar_other.php';
        require(TEMPLATES_PATH . "footer.php");
    }
}

