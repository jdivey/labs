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
        //SQL select statement
        $sql = "SELECT * FROM " . $this->db->getUserTable();

        //execute the query
        $query = $this->dbconnection->query($sql);

        if ($query && $query->num_rows > 0) {
            //array to store all users
            $users = array();

            //loop through all rows
            while ($query_row = $query->fetch_assoc()) {
                $users = new Index($query_row["firstname"],
                    $query_row["lastname"],
                    $query_row["username"],
                    $query_row["password"],
                    $query_row["email"]);
            }
        }
                //push the user into the array
                $users[] = $user;


    }
    public function verify_user() {
        $verifieduser = new Login();
        $verifieduser->display();
    }

    public function logout() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

//unset all the session variables
        $_SESSION = array();

//delete the session cookies
        setcookie(session_name(), "", time()-10);

//destroy the session
        session_destroy();
    }

    public function reset_password() {
        $newpass = new Reset();
        $newpass->display();
    }
}