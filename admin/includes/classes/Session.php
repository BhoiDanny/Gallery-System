<?php

class Session
{
    private $signedIn = false;
    public $user_id;
    public $message;

    public function __construct($theSession){
        session_name($theSession);
        session_start();
//        session_start(array("name" => "{$theSession}"));
        $this->checkLogin();
        $this->checkMessage();
    }

    public function message($msg=""){
        if(!empty($msg)) {
           return $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }
    }

    private function checkMessage(){
        if(isset($_SESSION['message'])){
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
    }

    public function isSignedIn() {
        return $this->signedIn;
    }

    public function login($user) {
        if($user) {
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signedIn = true;
        }
    }

    public function logout() {
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signedIn = false;
    }

    public function checkLogin() {
        if(isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->signedIn = true;
        } else {
            unset($this->user_id);
            $this->signedIn = false;
        }
    }

}
$session = new Session("GallerySystem");