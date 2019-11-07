<?php
/**
 * Author: Jacob Ivey
 * Date: 11/1/2019
 * File: user_model.class.php
 * Description:
 */

class UserModel
{
    //private attributes
    private $db;
    private $dbconnection;

    //UserModel constructor
    public function __construct()
    {
        $this->db= Database::getInstance();
        $this->dbconnection = $this->db->getConnection();
    }

    //add user function to add new users to database
    public function add_user()
    {

        $password = trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));

        //hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        //retrieve other user input from the registration form
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
            $firstname = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_STRING);
                $lastname = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_STRING);
                    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

        //SQL select statement
        $sql = "INSERT INTO" . $this->db->getUserTable(). "VALUES(NULL, '$username', '$hashed_password', '$email', '$firstname', '$lastname')";

        //execute the query
        if($this->dbconnection->query($sql) == TRUE ) {
            return true;
        }else{
            return false;
        }


    }

    public function verify_user() {
       $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
           $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

           $sql = "SELECT password FROM" . $this->db->getUserTable() . "WHERE username='$username'";

           //execute the query
           $query = $this->dbconnection->query($sql);

           if ($query = $this->dbconnection->query->num_rows > 0) {
               $result_row = $query->fetchassoc();
               $hash = $result_row['password'];
               if (password_verify($password, $hash)) {
                   setcookie("user", $username);
                   return true;
               }
           }
           return false;
    }

    public function logout() {
        setcookie("user", '', -10);
        return true;
}

    public function reset_password() {
        $username = trim(filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING));
        $password = trim(filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING));

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE  " . $this->db->getUserTable(). "SET password='$hashed_password' WHERE username='$username'";

        $query = $this->dbconnection->query($sql);

        if (!$query || $this->dbconnection->affected_rows == 0) {
            return false;
        }
        return true;
    }
}