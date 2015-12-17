<?php
/*
 * Projectname:   upload image files
 * Version:       1.0
 * Author:        Tzuly <tzulac@gmail.com>
 * Last modified: 22-feb-2014
 *
 * Free for use
 */

class UploadPicture
{
    /**
     * Allowed image types
     *
     * @var array
     */
    private $allowedType = array(
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/gif'
    );

    /**
     * Aloowed extensions
     *
     * @var array
     */
    private $alowedExtensions = array('gif', 'jpeg', 'jpg', 'png');

    /**
     * Maximum size for fileuploaded in kB - default 2000
     * Obs: check your ini files o see if is allowed 2000kB
     *
     * @var int
     */
    private $maxSize = 2000;

    /**
     * @var string The directory where files will be saved. Default value is current directory
     */
    private $savePath = __DIR__;

    /**
     * @var int Height of image desired for resize - in pixels - default 0
     */
    private $height = 0;

    /**
     * @var int Width of image desired for resize - in pixels - default 0
     */
    private $width = 0;

    /**
     * Constructor - empty
     */
    public function __construct()
    {
    }

    /**
     * Set max size for a file to upload
     *
     * @param int $size Size in kB
     * @return void
     */
    public function setMaxSize($size)
    {
        $this->maxSize = $size;
    }

    /**
     * Set directory where the file will be saved
     *
     * @param string $path Absolute path of directory where the file will be saved
     * @return void
     */
    public function setSavePath($path)
    {
        $this->savePath = $path;
    }

    /**
     * Get directory where the file will be saved
     *
     * @return string The absolute path where the files will be saved
     */
    public function getSavePath()
    {
        return $this->savePath;
    }

    /**
     * Set desired size of image saved
     *
     * @param int $width The width desired - in px
     * @param int $height The height desired - in px
     * @return void
     */
    public function setDesiredSize($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Save file on disk. If we choose the resize or to compress picture the file resulted will be jpeg.
     *
     * @param array  $file         Data from post request
     * @param string $fileSaveName The new name for picture, if we want to change the name (must have extension: .jpg, .gif,...)
     * $param bool   $resize       If we want to resize picture
     * $compress int $compress     Compressing value for image (recommanded 90)
     * @return string The name of picture uploaded
     * @throws \Exception
     */
    public function savePicture($file, $fileSaveName = null, $resize = false, $compress = 100)
    {
        //check if upload is a picture
        $this->checkFileType($file);

        //check file size
        $this->checkFileSize($file['size']);

        if (UPLOAD_ERR_OK != $file['error']) {
            throw new \Exception($this->getUploadMessageError($file['error']));
        }

        if (!is_null($fileSaveName)) {
            $file['name'] = $fileSaveName;
        }
        $filename = time().'_'.basename($file['name']);
        $savePath = rtrim($this->savePath, DIRECTORY_SEPARATOR)
            . DIRECTORY_SEPARATOR . $filename;
        if (is_uploaded_file($file['tmp_name'])) {
            if (!move_uploaded_file($file['tmp_name'], $savePath)) {
                throw new \Exception('Error on save file ' . $file['name'] . ' on disk');
            }
        }
        if($resize) {
            $this->resizePicture($savePath, $this->width, $this->height);
        }

        $this->compressPicture($savePath, $compress);

        // Return full path to the saved image
        return $filename;
    }

    /**
     * Resize an image file: the width will be used to keep the ratio
     *
     * @param string $fileName The file name to be resized
     * @param int    $width    The width desired - in px
     * @param int    $height   The height desired - in px
     * @return void
     */
    public function resizePicture($fileName, $width, $height)
    {
        $image = $this->getGdImage($fileName);

        $imageWidth = imagesx($image);
        $imageHeight = imagesy($image);

        $height = ($imageHeight/$imageWidth) * $width;
        $tmp = imagecreatetruecolor($width,$height);

        imagecopyresampled($tmp, $image, 0,0,0,0, $width, $height, imagesx($image), imagesy($image));

        imagejpeg($tmp, $fileName, 100);
        imagedestroy($tmp);
    }

    /**
     * Check file type to be uploaded
     *
     * @param array $file The file data from upload
     * @return void
     * @throws \Exception
     */
    private function checkFileType($file)
    {
        $expl = explode('.', $file['name']);
        $fileExtension = array_pop($expl);
        if (!in_array($fileExtension, $this->alowedExtensions)) {
            throw new \Exception('The extension ' . $fileExtension . ' is not allowed!');
        }

        //check type
        if (!in_array($file['type'], $this->allowedType)) {
            throw new \Exception('The file type ' . $file['type'] . ' is not allowed!');
        }
    }

    /**
     * Check file size of file uploaded
     *
     * @param int $size The size of file uploaded
     * @return void
     * @throws \Exception
     */
    private function checkFileSize($size)
    {
        if (($size / 1000) > $this->maxSize) {
            throw new \Exception('The file size ' . $size . ' is too big!');
        }
    }

    /**
     * Return upload error message
     * From php.net
     *
     * @param int $code The error code
     * @return string
     */
    private function getUploadMessageError($code)
    {
        switch ($code) {
        case UPLOAD_ERR_INI_SIZE:
            $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
            break;
        case UPLOAD_ERR_PARTIAL:
            $message = "The uploaded file was only partially uploaded";
            break;
        case UPLOAD_ERR_NO_FILE:
            $message = "No file was uploaded";
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            $message = "Missing a temporary folder";
            break;
        case UPLOAD_ERR_CANT_WRITE:
            $message = "Failed to write file to disk";
            break;
        case UPLOAD_ERR_EXTENSION:
            $message = "File upload stopped by extension";
            break;

        default:
            $message = "Unknown upload error";
            break;
        }
        return $message;
    }

    /**
     * Compress the file uploaded
     *
     * @param string $fileName The name of file to be compressed
     * @param int    $quality  The quality to be keeped
     * @return string
     */
    private function compressPicture($fileName, $quality = 90)
    {
        $image = $this->getGdImage($fileName);

        if (false == $image) {
            return;
        }

        //compress and save file to jpg
        imagejpeg($image, $fileName, $quality);

        //return destination file
        return $fileName;
    }

    /**
     * Get the image resource to be prelucrated
     *
     * @param string $fileName The path for the file to be prelucrated
     * @return resource an image resource identifier on success, FALSE on errors.
     * @throws \Exception
     */
    private function getGdImage($fileName)
    {
        $info = getimagesize($fileName);

        switch($info['mime']) {
        case 'image/jpeg':
            return imagecreatefromjpeg($fileName);
        case 'image/gif':
            return imagecreatefromgif($fileName);
        case 'image/png':
            return imagecreatefrompng($fileName);
        default:
            throw new \Exception('Unknown image file format');
        }
    }
}

/*EOF*/
