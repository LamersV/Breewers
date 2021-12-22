<?php

class User{
    

    public function login($email, $passwrd){
        global $conn;

        $sql = "SELECT * FROM TUser WHERE Email = :email AND Passwrd = :passwrd";
        $sql = $conn->prepare($sql);
        $sql->bindValue("email", $email);
        $sql->bindValue("passwrd", hash('sha256', $passwrd));
        $sql->execute();

        if($sql->rowCount() > 0){
            $data = $sql->fetch();

            $_SESSION['UserID'] = $data['ID_User'];
            $_SESSION['User'] = $data['Uname'];
            $_SESSION['Image'] = $data['Uimage'];

            return true;
        }
        else{
            return false;
        }
    }

    public function register($name, $email, $passwrd){
        global $conn;

        $emailtest = "SELECT * FROM TUser WHERE Email = :emailt";
        $emailtest = $conn->prepare($emailtest);
        $emailtest->bindValue("emailt", $email);
        $emailtest->execute();

        if($emailtest->rowCount() > 0){
            return 2;
        }

        $sql = "INSERT into TUser (Uname, Email, Passwrd, Uimage, SigninDate, LastUpdate) VALUES (:nome, :email, :passwrd, :img, :register, :updt)";
        $sql = $conn->prepare($sql);
        $sql->bindValue("nome", $name);
        $sql->bindValue("email", $email);
        $sql->bindValue("passwrd", hash('sha256', $passwrd));
        $sql->bindValue("img", 'pic-0.jpg');
        $sql->bindValue("register", date("Y-m-d"));
        $sql->bindValue("updt", date("Y-m-d H:i:s"));
        
        if($sql->execute()){
            return 1;
        }else{
            return 0;
        }
    }
}
