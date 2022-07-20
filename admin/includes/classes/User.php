<?php

class User extends Alpha {

    protected static $dbTable = "users";
    protected static $dbFields = array("username","password","first_name","last_name","user_image");
    public $id;
    public $user_image;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $uploadDirectory = "images";
    public $imagePlaceholder = "https://via.placeholder.com/200x200.png?text=User+Profile";

    public function setImage($image){
        if(empty($image) || !is_array($image)) {
            $this->errors[] = "No update was made";
            return false;
        } else if ($image['error'] !== 0) {
            $this->errors[] = $this->uploadErrors[$image['error']];
            return false;
        } else {
            $this->user_image = basename($image['name']);
            $this->tmpPath  = $image['tmp_name'];
            $this->type     = $image['type'];
            $this->size     = $image['size'];
            return true;
        }
    }

    public function saveUser()
    {
        if(!empty($this->errors)) {
            return false;
        }
        if(empty($this->user_image) || empty($this->tmpPath)) {
            $this->errors[] = "The File is not available";
            return false;
        }
        $targetPath = SITEROOT . DS . "admin" . DS . $this->uploadDirectory . DS . $this->user_image;

        if(file_exists($targetPath)) {
            $this->errors[] = "The image {$this->user_image} already exists on the server";
            return false;
        }
        if(move_uploaded_file($this->tmpPath, $targetPath)) {
            unset($this->tmpPath);
            return true;
        } else {
            $this->errors[] = "You do not have permission to upload into the Directory";
            return false;
        }
    }

    public function imagePlaceholder() {
        return empty($this->user_image) ? $this->imagePlaceholder : $this->uploadDirectory . DS . $this->user_image;
    }

    public static function verifyUser($username, $password) {
        global $db;
        $username = $db->escape_string($username);
        $password = $db->escape_string($password);

        $sql  = "SELECT * FROM `". static::$dbTable . "` WHERE ";
        $sql .= "`username` = '{$username}' AND `password` = '{$password}' LIMIT 1";
        $theArray = static::findByQuery($sql);
        return (!empty($theArray)) ? array_shift($theArray) : false;

    }
    public function deleteUser() {
        if($this->delete()){
            $targetPath = SITEROOT . DS . "admin" . DS . $this->uploadDirectory . DS . $this->user_image;
            if(unlink($targetPath)) { return true; } else { return false; }
        } else {
            return false;
        }
    }

    public function ajaxSaveUserImage($userImage, $userId){
        global $db;
        $this->user_image = $db->escape_string($userImage);
        $this->id = $db->escape_string($userId);
        $sql = "UPDATE " . static::$dbTable . " SET `user_image` = '{$this->user_image}' WHERE `id` = {$this->id}";
        $updateImage = $db->query($sql);
        echo $this->imagePlaceholder();

    }



}