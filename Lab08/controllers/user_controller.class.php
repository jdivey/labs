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
        $this->user_model = new UserModel();
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
        $this->user_model->add_user();
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
        return $view->display();
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
    public function getError()
    {
        $view = new UserError();
        return $view->display();
    }


}
