<?php

/**
 * User Class for account creation and login pupose
 */
class User {

    private $con;

    function __construct() {
        include_once("../database/db.php");
        $db = new Database();
        $this->con = $db->connect();
    }

    //User is already registered or not
    private function emailExists($email) {
        $pre_stmt = $this->con->prepare("SELECT id FROM user WHERE email = ? ");
        $pre_stmt->bind_param("s", $email);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        if ($result->num_rows > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function createUserAccount($username, $email, $password) {
        //To protect your application from sql attack you can user 
        //prepares statment
        if ($this->emailExists($email)) {
            return "EMAIL_ALREADY_EXISTS";
        } else {
            $pass_hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 8]);
            $date = date("d/m/Y");
            $pre_stmt = $this->con->prepare("INSERT INTO `user`(`username`, `email`, `password`, `registerdate`,`lastlogin`)
			 VALUES (?,?,?,?,?)");
            $pre_stmt->bind_param("sssss", $username, $email, $pass_hash, $date, $date);
            $result = $pre_stmt->execute() or die($this->con->error);
            if ($result) {
                return $this->con->insert_id;
            } else {
                return "SOME_ERROR";
            }
        }
    }

    public function userLogin($email, $password) {
        $pre_stmt = $this->con->prepare("SELECT id,email,username,password,lastlogin FROM user WHERE email = ?");
        $pre_stmt->bind_param("s", $email);
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();

        if ($result->num_rows < 1) {
            return "NOT_REGISTERD";
        } else {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row["password"])) {
                $_SESSION["userid"] = $row["id"];;

                //Here we are updating user last login time when he is performing login
                $last_login = date("d/m/Y H:i:s");
                $pre_stmt = $this->con->prepare("UPDATE user SET lastlogin = ? WHERE email = ?");
                $pre_stmt->bind_param("ss", $last_login, $email);
                $result = $pre_stmt->execute() or die($this->con->error);
                if ($result) {
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return "PASSWORD_NOT_MATCHED";
            }
        }
    }

}
//$date = date("d/m/Y");
//$user = new User();
//echo $user->createUserAccount("Test","test@gmail.com","1234567890");
//echo $user->userLogin("Hamza@gmail.com","1235");
?>