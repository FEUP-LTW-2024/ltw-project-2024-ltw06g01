<?php

class User {
    public $idUser;
    public $email;
    public $user;
    public $name;
    public $surName;
    public $password;
    public $admin;

    function __construct($idUser, $email, $user, $name, $surName, $password, $admin) {
        $this->idUser = $idUser;
        $this->email = $email;
        $this->user = $user;
        $this->name = $name;
        $this->surName = $surName;
        $this->password = $password;
        $this->admin = $admin;
    }
}
function login($db, $username, $password) {
    $query = "SELECT * FROM user WHERE User = :username AND PassWord = :password";
    $stmt = $db->prepare($query);
    

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        return $user; 
    } else {
        return false; 
    }
}
?>
