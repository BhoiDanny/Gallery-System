<?php

Abstract class Alpha
{
    public static function findAll() {
        return static::findByQuery("SELECT * FROM `". static::$dbTable . "`");
    }

    public static function findById($id){
        global $db;
        $theArray = static::findByQuery("SELECT * FROM `". static::$dbTable ."` WHERE `id` = $id LIMIT 1");
        /*Short Ternary way*/
        return (!empty($theArray)) ? array_shift($theArray) : false;
        /*Long Way of bringing the first result set in the array*/
        /*if(!empty($theArray)){
            $item = array_shift($theArray);
            return $item;
        } else {
            return false;
        }*/
    }

    public static function findByQuery($sql) {
        global $db;
        $result = $db->query($sql);
        $objectArray = array();
        while($row = $result->fetch_assoc()){
            $objectArray[] = static::instantiation($row);
        }
        return $objectArray;
    }

    /*Auto Instantiation Method
     * Instantiate the properties by assigning the values of the incoming values to the class properties
     * */
    /*public static function instantiation($foundUser){
        $object = new self;
        $object->id = $foundUser['id'];
        $object->username = $foundUser['username'];
        $object->password = $foundUser['password'];
        $object->firstname = $foundUser['first_name'];
        $object->lastname = $foundUser['last_name'];
        return $object;
    }*/

    /*Short Auto Instantiation Method*/
    protected static function instantiation($record) {
//        $object = new static; OR
        $calledClass = get_called_class();
        $object = new $calledClass;
        foreach($record as $attribute => $value) {
            if($object->hasAttribute($attribute)) {
                $object->$attribute = $value;
            }
        }
        return $object;
    }

    private function hasAttribute($attribute) {
        $objectAttribute = get_object_vars($this);
        return array_key_exists($attribute, $objectAttribute);
    }

    protected function grabProperties(){
//        return get_object_vars($this);
        $properties = array();
        foreach(static::$dbFields as $dbField) {
            if(property_exists($this, $dbField)) {
                $properties[$dbField] = $this->$dbField;
            }
        }
        return $properties;
    }

    protected function cleanProperties() {
        global $db;
        $properties = array();
        foreach ($this->grabProperties() as $key => $value) {
            $properties[$key] = $db->escape_string($value);
        }
        return $properties;
    }

    /*Create Method*/
    public function create() {
        global $db;

        $properties = $this->cleanProperties();

        $sql =  "INSERT INTO `". static::$dbTable . "` (`". implode("`,`", array_keys($properties)) ."`) ";
        $sql .= "VALUES ('" . implode("','", array_values($properties)) . "')";
//        $sql .= $db->escape_string($this->username) . "', '";
//        $sql .= $db->escape_string($this->password) . "', '";
//        $sql .= $db->escape_string($this->first_name) . "', '";
//        $sql .= $db->escape_string($this->last_name) . "')";

        if($db->query($sql)) {
            $this->id = $db->the_insert_id();
            return true;
        } else {
            return false;
        }
    }
    /*Save Method*/
    public function save() {
        return (isset($this->id)) ? $this->update() : $this->create();
    }

    /*Update Method*/
    public function update() {
        global $db;
        $properties = $this->cleanProperties();
        $propertyPairs = array();
        foreach($properties as $key => $value){
            $propertyPairs[] = "{$key}='{$value}'";
        }
        $sql  = "UPDATE `". static::$dbTable . "` SET ";
        $sql .= implode(", ", $propertyPairs);
//        $sql .= "`username` = '" . $db->escape_string($this->username) . "', ";
//        $sql .= "`password` = '" . $db->escape_string($this->password) . "', ";
//        $sql .= "`first_name` = '" . $db->escape_string($this->first_name) . "', ";
//        $sql .= "`last_name` = '" . $db->escape_string($this->last_name) . "' ";
        $sql .= "WHERE id = " . $db->escape_string($this->id);

        $db->query($sql);
        return ($db->connection->affected_rows === 1) ? true : false;
    }

    /*Delete Method*/
    public function delete() {
        global $db;
        $sql  = "DELETE FROM `". static::$dbTable . "` ";
        $sql .= "WHERE `id` = " . $db->escape_string($this->id) . " ";
        $sql .= "LIMIT 1";

        $db->query($sql);
        return ($db->connection->affected_rows === 1) ? true : false;

    }

}