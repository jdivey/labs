<?php
/**
 * Author: Jacob Ivey
 * Date: 11/14/2019
 * File: vehicle.class.php
 * Description:
 */

class Vehicle
{
    //private properties of a Vehicle object
    private $id, $model,  $year, $price, $stock, $image, $description;

    //the constructor that initializes all properties
    public function __construct($model, $year, $price, $stock, $image, $description) {
        $this->model = $model;
        $this->year = $year;
        $this->price = $price;
        $this->stock = $stock;
        $this->image = $image;
        $this->description = $description;
    }

    //get the id of a vehicle
    public function getId() {
        return $this->id;
    }

    //get the model of a vehicle
    public function getModel() {
        return $this->model;
    }

    //get the year of a vehicle
    public function getYear() {
        return $this->year;
    }

//get the price of a vehicle
    public function getPrice() {
        return $this->price;
    }

    //get the stock of the vehicle
    public function getStock() {
        return $this->stock;
    }

    //get the image file name of a vehicle
    public function getImage() {
        return $this->image;
    }

    //get the description of a vehicle
    public function getDescription() {
        return $this->description;
    }

    //set vehicle id
    public function setId($id) {
        $this->id = $id;
    }

}