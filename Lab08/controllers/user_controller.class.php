<?php
/**
 * Author: Victor Gonzalez
 * Date: 11/6/2019
 * File: user_controller.class.php
 * Description:
 */
require_once 'vendor/autoload.php';

class UserController
{
      private $user_model;


    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->user_model= new UserModel();

    }


    /**
     * @return mixed
     */
    public function getIndex()
    {
        $view = new Index();
        $view->display();
    }

    /**
     * @return mixed
     */
    public function getRegister()
    {
        $retult = $this->user_model->add_user();

        $result = new Register();
        $result->display($retult);


    }

    /**
     * @return mixed
     */
    //display the login
    public function getLogin()
    {
        $view = new Login();
        $view->display();
    }

    /**
     * @return mixed
     */
    public function getVerify()
    {
       $result =  $this->user_model->verify_user();
        $verify = new Verify();
        $verify->display($result);
    }

    /**
     * @return mixed
     */
    public function getLogout()
    {
        $this->user_model->logout();

        $logout = new Logout();
        $logout->display();
    }

    /**
     * @return mixed
     */
    public function getReset()
    {
        if (!isset($_COOKIE['user'])) {
            $this->error("To reset password, please login first.");
        }else{
            $user = $_COOKIE['user'];
            $view = new Reset();
            $view->display($user);
        }
        $this->user_model->reset_password();
        $view = new Reset();
         $view->display();
    }

    /**
     * @return mixed
     */
    public function getDoReset()
    {
        $result = $this->user_model->reset_password();

        $view = new ResetConfirm();
        $view->display($result);

    }

    /**
     * @return mixed
     */
    //display an error message
    public function getError($message)
    {
        $view = new UserError();
        $view->display($message);
    }


}
