<?php class ServeImgUpload extends Controller {
    // serve image files that are outside of the public folder
    // This is done by PHP regenerating the image
    // The code is used from this forum:
    // http://bytes.com/topic/php/answers/886538-retrieve-images-located-outside-web-root-using-php
    public function index() {
        $imgName = basename($_GET['image']);
        // -TODO Set dynamic pathing?
        $imgLocation = '/media/reggie/HDD/www/sonic_fusion/uploads/';
        $imgPath = $imgLocation . $imgName;
        if(!file_exists($imgPath) || !is_file($imgPath)) {
            // Set appropriate headers for not found content
            header('HTTP/1.0 404 Not Found');
            // Die or error?
            die('The file does not exists');
        }

        // Make sure the file is an image
        $imgData = getimagesize($imgPath);

        // TODO use better image verification
        if (!$imgData) {
            // Set appropriate headers for illegal images
            header('HTTP/1.0 403 Forbidden');
            // Die or error?
            die('THe file you registered is not an image');
        }

        // Set content type for an image display
        header('Content-type: '. $imgData['mime']);
        header('Content-length: '. filesize($imgPath));
        // Use clean for now to clean the previous templates and display image
        ob_clean();
        readfile($imgPath);
        /* exit; */
    }
}

