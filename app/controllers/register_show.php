<?php
class Register_show extends controller {
    public function index() {

        // require the home view
        require(TEMPLATES_PATH . "head.php");
        require APP . 'views/register_show.php';
    }
}

