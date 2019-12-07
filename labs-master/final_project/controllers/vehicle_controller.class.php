<?php
/**
 * Author: Jacob Ivey
 * Date: 11/14/2019
 * File: vehicle_controller.class.php
 * Description:
 */

class VehicleController
{
    private $vehicle_model;

    //default constructor
    public function __construct()
    {
        //create an instance of the VehicleModel class
        $this->vehicle_model = VehicleModel::getVehicleModel();
    }

    //index action that displays all vehicles
    public function index()
    {
        //retrieve all vehicles and store them in an array
        $vehicles = $this->vehicle_model->list_vehicle();

        if (!$vehicles) {
            //display an error
            $message = "There was a problem displaying vehicles.";
            $this->error($message);
            return;
        }

        // display all vehicles
        $view = new VehicleIndex();
        $view->display($vehicles);
    }

    //show details of a vehicle
    public function detail($id)
    {
        //retrieve the specific vehicle
        $vehicle = $this->vehicle_model->view_vehicle($id);

        if (!$vehicle) {
            //display an error
            $message = "There was a problem displaying the vehicle id='" . $id . "'.";
            $this->error($message);
            return;
        }

        //display vehicle details
        $view = new VehicleDetail();
        $view->display($vehicle);
    }

    //display a vehicle in a form for editing
    public function edit($id)
    {
        //retrieve the specific vehicle
        $vehicle = $this->vehicle_model->view_vehicle($id);

        if (!$vehicle) {
            //display an error
            $message = "There was a problem displaying the vehicle id='" . $id . "'.";
            $this->error($message);
            return;
        }

        $view = new VehicleEdit();
        $view->display($vehicle);
    }

    //update a vehicle in the database
    public function update($id)
    {
        //update the vehicle
        $update = $this->vehicle_model->update_vehicle($id);
        if (!$update) {
            //handle errors
            $message = "There was a problem updating the vehicle id='" . $id . "'.";
            $this->error($message);
            return;
        }

        //display the updated vehicle details
        $confirm = "The vehicle was successfully updated.";
        $vehicle = $this->vehicle_model->view_vehicle($id);

        $view = new VehicleDetail();
        $view->display($vehicle, $confirm);
    }

    //search vehicles
    public function search()
    {
        //retrieve query terms from search form
        $query_terms = trim($_GET['query-terms']);

        //if search term is empty, list all vehicles
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching vehicles
        $vehicles = $this->vehicle_model->search_vehicle($query_terms);

        if ($vehicles === false) {
            //handle error
            $message = "No seaech parameters!.";
            $this->error($message);
            return;
        }
        //display matched vehicles
        $search = new VehicleSearch();
        $search->display($query_terms, $vehicles);
    }

    //autosuggestion
    public function suggest($terms)
    {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $vehicles = $this->vehicle_model->search_vehicle($query_terms);

        //retrieve all vehicle models and store them in an array
        $models = array();
        if ($vehicles) {
            foreach ($vehicles as $vehicle) {
                $models[] = $vehicle->getModel();
            }
        }

        echo json_encode($models);
    }

    //handle an error
    public function error($message)
    {
        //create an object of the Error class
        $error = new VehicleError();

        //display the error page
        $error->display($message);
    }

    //handle calling inaccessible methods
    public function __call($name, $arguments)
    {
        //$message = "Route does not exist.";
        // Note: value of $name is case sensitive.
        $message = "Calling method '$name' caused errors. Route does not exist.";

        $this->error($message);
        return;
    }

    //display a vehicle in a form for adding
    public function add()
    {
        $view = new VehicleAdd();
        $view->display($vehicle);
    }

    public function insert()
    {
        //insert the vehicle
        $insert = $this->vehicle_model->insert_vehicle();
        if ($insert) {
            //handle errors
            $message = "There was a problem inserting the vehicle into the database.";
            $this->error($message);
            return;
        }

        //display the updated vehicle details
        $confirm = "The vehicle was successfully added.";

        $view = new VehicleAdd();
        $view->display($vehicle);

    }

    public function delete($id) {
        $delete = $this->vehicle_model->delete_vehicle($id);
        if ($delete) {
            //handle errors
            $message = "There was a problem removing the vehicle from the database.";
            $this->error($message);
            return;
        }

        //display the inserted vehicle details
        $confirm = "The vehicle was successfully removed.";
        $vehicle = $this->vehicle_model->list_vehicle();

        $view = new VehicleIndex();
        $view->display($vehicle);
        return $confirm;
    }


}