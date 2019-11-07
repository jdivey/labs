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
      private $user_model, $index, $register, $login, $verify, $logout, $reset, $error;


    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->user_model= new UserModel();
        $this->index = new Index();
        $this->register = new Register();
        $this->login = new Login();
        $this->verify= new Verify();
        $this->logout = new Logout();
        $this->reset = new Reset();
        $this->error = new Error();
    }


    /**
     * @return mixed
     */
    public function getIndex()
    {
        $view = new Index();
        return $view->display();
    }

    /**
     * @return mixed
     */
    public function getRegister()
    {
       $result = $this->user_model->add_user();

       if ($result) {
           $message = "Passed";
           $this->
       }else{
           $this->
       }
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        $view = new Login();
        return $view->display();
    }

    /**
     * @return mixed
     */
    public function getVerify()
    {
        $this->user_model->verify_user();
    }

    /**
     * @return mixed
     */
    public function getLogout()
    {
        $this->user_model->logout();
    }

    /**
     * @return mixed
     */
    public function getReset()
    {
        $view = new Reset();
         $view->display();
    }

    /**
     * @return mixed
     */
    public function getDoReset()
    {
        $this->user_model->reset_password();
    }

    /**
     * @return mixed
     */
    public function getError($message)
    {
        $view = new UserError();
        $view->display($message);
    }


}
