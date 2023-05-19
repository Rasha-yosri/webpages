<?php

class User{
    private $db;
    public function __construct($db){
        $this->db= $db;
    }

    public function register($username, $email,$password){
        $password= hash("sha512" ,$password);
        $query= $this->db->prepare("INSERT INTO user(username,email,password) VALUES(?,?,?)") ;
        $query->bind_param("sss", $username, $email,$password);
        return $query->execute();
    }
}