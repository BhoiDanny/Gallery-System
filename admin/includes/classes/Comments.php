<?php

class Comments extends Alpha
{
    protected static $dbTable = "comments";
    protected static $dbFields = array("id","photo_id","author","body","time");
    public $id;
    public $photo_id;
    public $author;
    public $body;
    public $time;

    public static function createComment($photo_id, $author="Daniel", $body=""){
        if(!empty($photo_id) && !empty($author) && !empty($body)){
            $comment = new Comments();
            $comment->photo_id = (int)$photo_id;
            $comment->author = $author;
            $comment->body = $body;
            $comment->time = date("F j, Y, \a\\t g:i A");
            return $comment;
        } else {
            return false;
        }
    }

    public static function findComments($photo_id) {
        global $db;
        $sql = "SELECT * FROM " . static::$dbTable . " WHERE `photo_id`= " . $db->escape_string($photo_id) . " ORDER BY `photo_id` ASC";
        return static::findByQuery($sql);
    }

}//End of Class