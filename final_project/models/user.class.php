<?php
/**
 * Author: Jacob Ivey
 * Date: 12/9/2019
 * File: user.class.php
 * Description:
 */

class User
{
    //private properties of a Vehicle object
    private $username, $password, $email, $firstname, $lastname, $role;

    //the constructor that initializes all properties
    public function __construct($username, $password, $email, $firstname, $lastname, $role) {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->role = $role;
    }


    //get the model of a vehicle
    public function getUsername() {
        return $this->username;
    }

    //get the year of a vehicle
    public function getPassword() {
        return $this->password;
    }

//get the price of a vehicle
    public function getEmail() {
        return $this->email;
    }

    //get the stock of the vehicle
    public function getFirstName() {
        return $this->firstname;
    }

    //get the image file name of a vehicle
    public function getLastName() {
        return $this->lastname;
    }

    //get the role of the user
    public function getRole() {
        return $this->role;
    }

}