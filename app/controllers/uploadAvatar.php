<?php
class UploadAvatar extends controller {
    public function index() {
        $searchEvents;
        if (isset($_GET['search'])) {
            $searchEvents = $this->model->searchEvents($_GET['search']);
        }
        // require the home view
        require(TEMPLATES_PATH . "head.php");
        require APP . 'views/uploadForm.php';
    }

    public function save() {
        $uploadStatus;
        if (isset($_FILES['file'])) {
            require APP . "lib/UploadPicture.php";
            //? Separate Upload Logic into service ?
            $upload1 = new UploadPicture();
            $upload1->setSavePath(rtrim(ROOT, DIRECTORY_SEPARATOR)
                . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR);
            $upload1->setDesiredSize(300, 300);
            try {
                // savePicture() returns full path to the image
                $savedFileName = $upload1->savePicture($_FILES['file'], null, true, 50);
                // Store the path URL into the User database
                $this->model->insertUserAvatarUrl($_SESSION['valid_user'],
                    $savedFileName);
                // Redirect to the home page
                header('location: '. URL .'home');
            } catch (Exception $exc) {
                // Where would the message go if fail?
                $uploadStatus = $exc->getMessage();
            }
        } else {
            // Save the Error message for display
            $uploadStatus = 'No File was selected <br/>';
        }
        // require the upload status view
        // Invoked if there is any error
        require(TEMPLATES_PATH . "head.php");
        require APP . 'views/uploadFile.php';
        require(TEMPLATES_PATH . "head.php");
        require(TEMPLATES_PATH . "navigation.php");
    }
}

