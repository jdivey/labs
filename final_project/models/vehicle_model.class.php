<?php
/**
 * Author: Jacob Ivey
 * Date: 11/14/2019
 * File: vehicle_model.class.php
 * Description:
 */

class VehicleModel
{
    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblVehicle;
    //private $tblBookCategory;

    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getVehicleModel method must be called.
    private function __construct()
    {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblVehicle = $this->db->getVehicleTable();
        // $this->tblBookCategory = $this->db->getBookCategoryTable();

        //Escapes special characters in a string for use in an SQL statement. This stops SQL inject in POST vars.
        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        //Escapes special characters in a string for use in an SQL statement. This stops SQL Injection in GET vars
        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }

        /* //initialize book categories
         if (!isset($_SESSION['book_categories'])) {
             $categories = $this->get_book_categories();
             $_SESSION['book_categories'] = $categories;
         }*/
    }

    //static method to ensure there is just one VehicleModel instance
    public static function getVehicleModel()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new VehicleModel();
        }
        return self::$_instance;
    }

    /*
     * the list_vehicle method retrieves all vehicles from the database and
     * returns an array of Vehicle objects if successful or false if failed.
     * Vehicles should also be filtered by categories and/or sorted by titles or category if they are available.
     */

    public function list_vehicle()
    {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */

        $sql = "SELECT * FROM " . $this->tblVehicle;


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
        $vehicles = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $vehicle = new Vehicle(stripslashes($obj->model), stripslashes($obj->year), stripslashes($obj->price), stripslashes($obj->stock), stripslashes($obj->image), stripslashes($obj->description));

            //set the id for the vehicle
            $vehicle->setId($obj->id);

            //add the vehicle into the array
            $vehicles[] = $vehicle;
        }
        return $vehicles;
    }

    /*
     * the viewVehicle method retrieves the details of the vehicle specified by its id
     * and returns a vehicle object. Return false if failed.
     */

    public function view_vehicle($id)
    {
        //the select sql statement
        $sql = "SELECT * FROM " . $this->tblVehicle .
            " WHERE " . $this->tblVehicle . ".id='$id'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a vehicle object
            $vehicle = new Vehicle(stripslashes($obj->model), stripslashes($obj->year), stripslashes($obj->price), stripslashes($obj->stock), stripslashes($obj->image), stripslashes($obj->description));

            //set the id for the vehicle
            $vehicle->setId($obj->id);

            return $vehicle;
        }

        return false;
    }

    //the update_vehicle method updates an existing vehicle in the database. Details of the vehicle are posted in a form. Return true if succeed; false otherwise.
    public function update_vehicle($id)
    {
        //if the script did not received post data, display an error message and then terminate the script immediately
        if (!filter_has_var(INPUT_POST, 'model') ||
            !filter_has_var(INPUT_POST, 'year') ||
            !filter_has_var(INPUT_POST, 'price') ||
            !filter_has_var(INPUT_POST, 'stock') ||
            !filter_has_var(INPUT_POST, 'image') ||
            !filter_has_var(INPUT_POST, 'description')) {

            return false;
        }

        //retrieve data for the new vehicle; data are sanitized and escaped for security.
        $model = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING)));
        $year = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'year', FILTER_SANITIZE_STRING)));
        $price = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'price', FILTER_DEFAULT));
        $stock = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'stock', FILTER_SANITIZE_STRING)));
        $image = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
        $description = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

        try{
            if (empty($model) || empty($year) || empty($price) || empty($stock) || empty($image) || empty($description)) {
                throw new DataMissingException("Please fill out all fields.");
            }
            //query string for update
            $sql = "UPDATE " . $this->tblVehicle .
                " SET model='$model', year='$year', price='$price', stock='$stock', "
                . "image='$image', description='$description' WHERE id='$id'";

            if ($this->dbConnection->query($sql) == FALSE ){
                throw new DatabaseException("There was a problem connecting to the database.");
            }
        }catch(DataMissingException $e) {
            return $e->getMessage();
        }catch (DatabaseException $e) {
            return $e->getMessage();
        }catch (Exception $e) {
            return $e->getMessage();
        }

        //execute the query
        return $this->dbConnection->query($sql);
    }

    //search the database for vehicles that match words in models. Return an array of vehicles if succeed; false otherwise.
    public function search_vehicle($terms)
    {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND search
        $sql = "SELECT * FROM " . $this->tblVehicle .
            " WHERE " . $this->tblVehicle . ".id=" . $this->tblVehicle . ".id AND (1";

        foreach ($terms as $term) {
            $sql .= " AND model LIKE '%" . $term . "%'";
        }

        $sql .= ")";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false.
        if (!$query)
            return false;

        //search succeeded, but no vehicle was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 vehicle found.
        //create an array to store all the returned vehicles
        $vehicles = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $vehicle = new Vehicle($obj->model, $obj->year, $obj->price, $obj->stock, $obj->image, $obj->description);

            //set the id for the vehicle
            $vehicle->setId($obj->id);

            //add the book into the array
            $vehicles[] = $vehicle;
        }
        return $vehicles;
    }

    public function insert_vehicle()
    {
        //if the script did not received post data, display an error message and then terminate the script immediately
        if (!filter_has_var(INPUT_POST, 'model') ||
            !filter_has_var(INPUT_POST, 'year') ||
            !filter_has_var(INPUT_POST, 'price') ||
            !filter_has_var(INPUT_POST, 'stock') ||
            !filter_has_var(INPUT_POST, 'image') ||
            !filter_has_var(INPUT_POST, 'description')) {

            echo "There was a problem receiving vehicle details. New vehicle cannot be added.";
        }

        //retrieve data for the new vehicle; data are sanitized and escaped for security.
        $model = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING)));
        $year = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'year', FILTER_SANITIZE_STRING)));
        $price = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'price', FILTER_DEFAULT));
        $stock = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'stock', FILTER_SANITIZE_STRING)));
        $image = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
        $description = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));


        try{
            if (empty($model) || empty($year) || empty($price) || empty($stock) || empty($image) || empty($description)) {
                throw new DataMissingException("Please fill out all fields.");
            }



        }catch(DataMissingException $e) {
           return $e->getMessage();
        }
        //add your code below
        //define the insert statement
        //define the insert statement
        $sql = "INSERT INTO $this->tblVehicle VALUES (NULL, '$model', '$year', '$price', '$stock', '$image', '$description')";


        $query = $this->dbConnection->query($sql);

        //handle errors

        if (!$query) {
            $this->dbConnection->close();
            die();
        }


        //close the database connection
        $this->dbConnection->close();

    }

    public function delete_vehicle($id) {
        //retrieve book id from a query string variable.
       // $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


//add your code here
        $sql = "DELETE FROM $this->tblVehicle WHERE id=$id";

        $query = $this->dbConnection->query($sql);

        //handle errors

        if(!$query) {
            $this->dbConnection->close();
            die();
        }
    }

}