<?php
class User {
    public $IdUser;
    public $email;
    public $user;
    public $name;
    public $surName;
    public $password;
    public $img;
    public $admin;

    function __construct($IdUser, $email, $user, $name, $surName, $password,$img, $admin) {
        $this->IdUser = $IdUser;
        $this->email = $email;
        $this->user = $user;
        $this->name = $name;
        $this->surName = $surName;
        $this->password = $password;
        $this->img = $img;
        $this->admin = $admin;
    }
}
function get_user_by_id($id) {
    $db = new PDO('sqlite:../database/database.db');
    $query = "SELECT * FROM user WHERE IdUser = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id);
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
            $userData['img'],
            $userData['Admin']
        );
        
        return $user;
    } else {
        return null;
    }
}
function get_user($username) {
    $db = new PDO('sqlite:../database/database.db');
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
            $userData['img'],
            $userData['Admin']
        );
        
        return $user;
    } else {
        return null;
    }
}
function login($db, $username, $password) {
    $query = "SELECT * FROM user WHERE User = :username";
    $stmt = $db->prepare($query);
    

    $stmt->bindParam(':username', $username);
    
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (password_verify($password,$user['PassWord'])) {
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
  function change_description($db, $username, $Description) {
    $query = "UPDATE USER SET Description = :description WHERE User = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':description', $Description);
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
  function print_pic($user) {
    $db = new PDO('sqlite:../database/database.db');
    $image = $user->img;
    if ($image != NULL){
        $imageSource = "data:image/jpeg;base64," . base64_encode($image);
        print"<img src=\"$imageSource\" alt='Profile Picture' id='profile_pic' style='border-radius: 50%;background: black;aspect-ratio: 1/1;'>";
    }
    else {
        print" <img src='../img/account.png' alt='Profile Picture' id='profile_pic' style='border-radius: 50%;background: black;'>";
    }

  }
  function promote_admin($db, $username) {
    $query = "UPDATE USER SET Admin = :admin WHERE User = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindValue(':admin', "true");
    return $stmt->execute();
  }
 function print_messages($sender ,$receiver) {
    $db = new PDO('sqlite:../database/database.db');
    $query = "SELECT * FROM MESSAGE";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($messages as $message) {
        if ($message['Sender'] == $sender){
            if ($message['Receiver'] == $receiver){
                echo "<p>" . $message['message'] . "</p>";
            }
        }
        if ($message['Receiver'] == $sender){
            if ($message['Sender'] == $receiver){
                echo "<p class='him'>" . $message['message'] . "</p>";
            }
        }
 }
}
function print_last_message($sender ,$receiver) {
    $db = new PDO('sqlite:../database/database.db');
    $query = "SELECT * FROM MESSAGE";
    $stmt = $db->prepare($query);
    $stmt->execute();
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($messages as $message) {
        if ($message['Sender'] == $sender){
            if ($message['Receiver'] == $receiver){
                $last = "<p>" . $sender . " : " . $message['message'] . "</p>";
            }
        }
        if ($message['Receiver'] == $sender){
            if ($message['Sender'] == $receiver){
                $last = "<p class='him'>" . $receiver . " : " . $message['message'] . "</p>";
            }
        }
 }
 echo $last;
}
function check_message($sender ,$receiver) {
    $db = new PDO('sqlite:../database/database.db');
    $id = get_user($receiver);
    $id = $id->IdUser;
    $query = "SELECT * FROM MESSAGE WHERE Receiver = :receiver AND Sender = :sender";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':receiver', $receiver);
    $stmt->bindParam(':sender', $sender);
    $stmt->execute();
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($messages){
        echo "<a class ='chattermessages' href='chat.php?id={$id}'>";
        print_pic(get_user($receiver));
        echo "<div class ='chatterid'>";
        echo "{$receiver}";
        echo "<p>";
        print_last_message($sender,$receiver);
        echo "</div>";  
        echo "</a>";
        return;
    }
    $query = "SELECT * FROM MESSAGE WHERE Receiver = :sender AND Sender = :receiver";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':receiver', $receiver);
    $stmt->bindParam(':sender', $sender);
    $stmt->execute();
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($messages){
        echo "<a class ='chattermessages' href='chat.php?id={$id}'>";
        print_pic(get_user($receiver));
        echo "<div class ='chatterid'>";
        echo "{$receiver}";
        print_last_message($sender,$receiver);
        echo "</div>";
        echo "</a>";
        return;
    }
 }
?>
