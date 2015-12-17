<?php
class Home extends Controller {
    public function index() {
        // Get user form data
        $userAvatar;
        $userData;
        // Set user session if form data is posted
        if (isset($_POST['form_nickname']) && isset($_POST['form_password'])) {
            $userName = $_POST['form_nickname'];
            $userPassword = $_POST['form_password'];
            // Make use of UserData
            if ($userData = $this->model->getUserSession($userName, $userPassword)) {
                $_SESSION['valid_user'] = $userName;
            }
        }
        if (isset($_SESSION['valid_user'])) {
            $userAvatar = $this->model->getUserAvatarUrl($_SESSION['valid_user']);
            // Convert File Url for PHP processing so that it
            // could be served outside public folder
            $eventsData = $this->model->getEventsData($_SESSION['valid_user']);
        }
        // Require the home view
        require(TEMPLATES_PATH . "head.php");
        require(TEMPLATES_PATH . "navigation.php");
        require APP . 'views/home_part1.php';
        require APP . 'views/home_part2.php';
        require APP . 'views/home_part3.php';
        require(TEMPLATES_PATH . "footer.php");
    }
}

