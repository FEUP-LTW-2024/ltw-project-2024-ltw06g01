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
function checkUsernameExists($db, $username) {
    $query = "SELECT * FROM user WHERE user = :username";
    $result = $db->query($query);
    $result->bindParam(':username', $username);
    $result->execute();
    $user2 = $result->fetchAll(PDO::FETCH_ASSOC);
    
    return $user2;
}
function register($db, $username, $password,$email,$name,$sur) {
    $stmt= $db->prepare('INSERT INTO USER (Email,User,PassWord,Name,SurName,Admin) VALUES (?,?,?,?,?,?)');
    if ($stmt->execute([$email, $username, $password,$name,$sur,'false'])) {
        if ($stmt->rowCount() > 0) {
            return true;
        } 
        else {
            return false;
        }
    }
}
?>
