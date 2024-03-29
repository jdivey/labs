<?php
/**
 * Author: Jacob Ivey
 * Date: 12/9/2019
 * File: user_model.class.php
 * Description:
 */


/*
 * Author: Victor Gonzalez
 * Date: 12/7/2019
 * Name: user_model.class.php
 * Description: The UserModel class manages user data in the database.
 */

class UserModel
{
    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblUser;


    private function __construct()
    {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblUser = $this->db->getUserTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }

    }

    //static method to ensure there is just one BookModel instance
    public static function geUserModel()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new UserModel();
        }
        return self::$_instance;
    }

    public function list_user()
    {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */

        $sql = "SELECT * FROM " . $this->tblUser;


        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false.
        if (!$query)
            return false;

        //if the query succeeded, but no vehicle was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result
        //create an array to store all returned vehicles
        $users = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $user = new User(stripslashes($obj->username), stripslashes($obj->password), stripslashes($obj->email), stripslashes($obj->firstname), stripslashes($obj->lastname), stripslashes($obj->role));


            //add the vehicle into the array
            $users[] = $user;
        }
        return $users;
    }

    //add a user into the "users" table in the database
    public function add_user()
    {
        //retrieve user inputs from the registration form
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
        $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_STRING);
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
       $role = filter_input(INPUT_POST, 'role'. FILTER_SANITIZE_STRING);
        try {
            //Handle data missing exception. All fields are required.
            if (empty($username) || empty($password) || empty($lastname) || empty($firstname) || empty($email) || empty($role)) {
                throw new DataMissingException("Values were missing in one or more fields. All fields must be filled.");
            }
            //Handle data length exception. The min length of a password is 5.
            if (strlen($password) < 5) {
                throw new DataLengthException("Your password was invalid. The mininum length of a password is 5.");
            }
            //Handle email format exception.
            if (!Utilities::checkemail($email)) {
                throw new EmailFormatException("Your email format was invalid. The general format of an email address is user@example.com.");
            }
            //hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            //construct an INSERT query
            $sql = "INSERT INTO " . $this->db->getUserTable() . " VALUES('$username', '$password', '$email', '$firstname', '$lastname')";
            //Execute the query. Throw a database exception if the query failed.
            if ($this->dbConnection->query($sql) === FALSE) {
                throw new DatabaseException("We are sorry, but we cannot create your account at this moment. Please try again later.");
            }
        } catch (DataMissingException $e) {
            return $e->getMessage();
        } catch (DataLengthException $e) {
            return $e->getMessage();
        } catch (DatabaseException $e) {
            return $e->getMessage();
        } catch (EmailFormatException $e) {
            return $e->getMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }

        $message = 'You have successfully registered.';
        return $message;

    }

    //verify username and password against a database record
    public function verify_user()
    {
        //retrieve username and password
        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
        try {
            //Handle data missing exception. All fields are required.
            if (empty($username) || empty($password)) {
                throw new DataMissingException("Values were missing in one or more fields. All fields must be filled.");
            }
            //sql statement to filter the users table data with a username
            $sql = "SELECT password FROM " . $this->db->getUserTable() . " WHERE username='$username'";
            //execute the query
            $query = $this->dbConnection->query($sql);

            if (!$query) {
                throw new DatabaseException("We are sorry, but we cannot create your account at this moment. Please try again later.");
            }
            //verify password; if password is valid, set a temporary cookie
            if ($query->num_rows > 0) {
                $result_row = $query->fetch_assoc();
                $hash = $result_row['password'];
                if ($password == $hash) {
                    setcookie("user", $username);
                    return "$username have successfully logged in.";



                }

                else {
                    throw new DatabaseException("Your username and/or password were invalid. Please try again.");

                }
            } else {
                throw new DatabaseException(" invalid. Please try again.");

            }
        } catch (DataMissingException $e) {
            return $e->getMessage();
        } catch (DatabaseException $e) {
            return $e->getMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }

    }


//logout user: destroy session data
    public function logout()
    {
//destroy session data
        setcookie("user", '', -10);
        return true;
    }

//reset password
    public function reset_password()
    {
//retrieve username and password from a form
        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
        try {
            //Handle data missing exception. All fields are required.
            if (empty($username) || empty($password)) {
                throw new DataMissingException("Values were missing in one or more fields. All fields must be filled.");
            }
            //Handle data length exception. The min length of a password is 5.
            if (strlen($password) < 5) {
                throw new DataLengthException("Your password is invalid. The mininum length of a password is 5.");
            }
            //hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            //the sql statement for update
            $sql = "UPDATE  " . $this->db->getUserTable() . " SET password='$hashed_password' WHERE username='$username'";
            //execute the query
            $query = $this->dbConnection->query($sql);
            //return false if no rows were affected
            if (!$query || $this->dbConnection->affected_rows == 0) {
                throw new DatabaseException("We are sorry, but we cannot reset your password at this moment. Please try again later.");
            }
        } catch (DataMissingException $e) {
            return $e->getMessage();
        } catch (DataLengthException $e) {
            return $e->getMessage();
        } catch (DatabaseException $e) {
            return $e->getMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return "You have successfully reset your password.";
    }

    public function delete_user($username) {
        //retrieve book id from a query string variable.
        // $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


//add your code here
        $sql = "DELETE FROM $this->tblUser WHERE username=$username";

        $query = $this->dbConnection->query($sql);

        //handle errors

        if(!$query) {
            $this->dbConnection->close();
            die();
        }
    }

    public function login() {
        //start session if it has not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

//create variable login status.
        $_SESSION['login_status'] = 1;

//initialize variables for username and password
        $username = $passcode = "";

//retrieve user name and password from the form in the registerform.php
        if (isset($_POST['username']))
            $username = $this->dbConnection->real_escape_string(trim($_POST['username']));

        if (isset($_POST['password']))
            $password = $this->tblUser->real_escape_string(trim($_POST['password']));

//validate user name and password against a record in the users table in the database. If they are valid, create session variables.
        $sql = "SELECT * FROM $this->tblUser WHERE username='$username' AND password='$password'";


        $query = $this->dbConnection->query($sql);

        if($query->num_rows) {
            //it is a valid user. need to store the user in session variables.
            $row = $query->fetch_assoc();
            $_SESSION['login'] = $username;
            $_SESSION['role'] = $row['role'];
            $_SESSION['name'] = $row['firstname'] . " " . $row['lastname'];
            $_SESSION['login_status'] = 0;
        }



//close the connection
        $this->dbConnection->close();

    }

}