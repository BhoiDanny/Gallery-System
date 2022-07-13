<?php

class Photos extends Alpha
{
    protected static $dbTable = "photos";
    protected static $dbFields = array("title","description","filename","type","size");
    public $id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;

    public $tmpPath;
    public $uploadDirectory = "images";
    public $errors = array();
    public $uploadErrors = array (
        UPLOAD_ERR_OK           => "There is no error",
        UPLOAD_ERR_INI_SIZE		=> "The uploaded file exceeds the upload_max_filesize directive in php.ini",
        UPLOAD_ERR_FORM_SIZE    => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
        UPLOAD_ERR_PARTIAL      => "The uploaded file was only partially uploaded.",
        UPLOAD_ERR_NO_FILE      => "No file was uploaded.",
        UPLOAD_ERR_NO_TMP_DIR   => "Missing a temporary folder.",
        UPLOAD_ERR_CANT_WRITE   => "Failed to write file to disk.",
        UPLOAD_ERR_EXTENSION    => "A PHP extension stopped the file upload."
    );

    public function setFile($file){
        if(empty($file) || !is_file($file) || !is_array($file)) {
            $this->errors[] = "There was no file uploaded";

            return false;
        } else if ($file['error'] !== 0) {
            $this->errors[] = $this->uploadErrors[$file['error']];
            return false;
        } else {
            $this->filename = basename($file['name']);
            $this->tmpPath  = $file['tmp_name'];
            $this->type     = $file['type'];
            $this->size     = $file['size'];
            return true;
        }
    }

    public function save()
    {

    }

}
