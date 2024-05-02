<?php
class User {
    public $userId;
    public $email;
    public $user;
    public $name;
    public $surName;
    public $password;
    public $admin;

    function __construct($userId, $email, $user, $name, $surName, $password, $admin) {
        $this->userId = $userId;
        $this->email = $email;
        $this->user = $user;
        $this->name = $name;
        $this->surName = $surName;
        $this->password = $password;
        $this->admin = $admin;
    }
}
function get_user($db, $username) {
    $query = "SELECT * FROM user WHERE User = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($userData) {
        $user = new User(
            $userData['IdUser'],
            $userData['Email'],
            $userData['User'],
            $userData['Name'],
            $userData['SurName'],
            $userData['PassWord'],
            $userData['Admin']
        );
        
        return $user;
    } else {
        return null;
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
function change_user($db, $username, $new_user) {
    $query = "UPDATE user SET User = :user WHERE User = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':user',$new_user );
    if ($stmt->execute()) {
        return true;
    } 
    else {
        return false;
    }
} 
function change_email($db, $username, $email) {
    $query = "UPDATE USER SET Email = :email WHERE User = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    return $stmt->execute();
  }
  
  function change_name($db, $username, $name) {
    $query = "UPDATE USER SET Name = :name WHERE User = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':name', $name);
    return $stmt->execute();
  }
  
  function change_surname($db, $username, $surname) {
    $query = "UPDATE USER SET SurName = :surname WHERE User = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':surname', $surname);
    return $stmt->execute();
  }
  
  function change_pass($db, $username, $password) {
    $query = "UPDATE USER SET PassWord = :password WHERE User = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    return $stmt->execute();
  }

?>
