<?php
class News extends controller {
    public function index() {
        $searchEvents;

        if (isset($_GET['search'])) {
            $searchEvents = $this->model->searchEvents($_GET['search']);
        }
        // require the home view
        require(TEMPLATES_PATH . "head.php");
        require(TEMPLATES_PATH . "navigation.php");
        require APP . 'views/news.php';
        require TEMPLATES_PATH .'sidebar_news.php';
        require(TEMPLATES_PATH . "footer.php");
    }

    public function save() {
        $searchEvents;

        if (isset($_GET['search'])) {
            $searchEvents = $this->model->searchEvents($_GET['search']);
        }
        // require the home view
        require(TEMPLATES_PATH . "head.php");
        require(TEMPLATES_PATH . "navigation.php");
        require APP . 'views/news.php';
        require TEMPLATES_PATH .'sidebar_news.php';
        require(TEMPLATES_PATH . "footer.php");
    }

}

