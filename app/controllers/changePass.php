<?php
class ChangePass extends controller {

    public function index() {
        if (isset($_SESSION['valid_user'])) {
            if (isset($_POST['password']) && !empty($_POST['password'])&&
                !empty($_POST['password-check'])) {
                    $userPass = $this->model->getUserPass($_SESSION['valid_user']);
                    if ($userPass === sha1($_POST['password'])) {
                        $passwordChange =
                            $this->model->updateUserPass($_SESSION['valid_user'],
                                $_POST['password-check']);
                    } else {
                        $passwordChange = false;
                    }
                }
        }
        // require the home view
        require(TEMPLATES_PATH . "head.php");
        require APP . 'views/change_pass.php';
    }
}
