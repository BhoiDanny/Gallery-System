<?php

class Photos extends Alpha
{
    protected static $dbTable = "photos";
    protected static $dbFields = array("id","title","caption","description","filename","alt_text","type","size");
    public $id;
    public $title;
    public $caption;
    public $description;
    public $filename;
    public $alt_text;
    public $type;
    public $size;

    public $tmpPath;
    public $uploadDirectory = "images";


    /*Grab and attach the picture name to the directory*/
    public function picturePath() {
        return $this->uploadDirectory . DS . $this->filename;
    }

    public function save()
    {
        if($this->id) {
            $this->update();
            return true;
        } else {
            if(!empty($this->errors)) {
                return false;
            }
            if(empty($this->filename) || empty($this->tmpPath)) {
                $this->errors[] = "The File is not available";
                return false;
            }
            $targetPath = SITEROOT . DS . "admin" . DS . $this->uploadDirectory . DS . $this->filename;

            if(file_exists($targetPath)) {
                $this->errors[] = "The file {$this->filename} already exists";
                return false;
            }
            if(move_uploaded_file($this->tmpPath, $targetPath)) {
                if($this->create()) {
                    unset($this->tmpPath);
                    return true;
                }
            } else {
                $this->errors[] = "You do not have permission to upload into the Directory";
                return false;
            }
            return false;
        }
    }

    public function deletePhoto() {
        if($this->delete()){
            $targetPath = SITEROOT . DS . "admin" . DS . $this->picturePath();
            if(unlink($targetPath)) { return true; } else { return false; }
        } else {
            return false;
        }
    }

}
