<?php
/**
 * Author: Jacob Ivey
 * Date: 11/1/2019
 * File: user_controller.class.php
 * Description:
 */

class UserController
{
      private $index, $register, $login, $verify, $logout, $reset, $do_reset, $error;

    /**
     * UserController constructor.
     * @param $index
     * @param $register
     * @param $login
     * @param $verify
     * @param $logout
     * @param $reset
     * @param $do_reset
     * @param $error
     */
    public function __construct($index, $register, $login, $verify, $logout, $reset, $do_reset, $error)
    {
        $this->index = $index;
        $this->register = $register;
        $this->login = $login;
        $this->verify = $verify;
        $this->logout = $logout;
        $this->reset = $reset;
        $this->do_reset = $do_reset;
        $this->error = $error;
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @return mixed
     */
    public function getRegister()
    {
        return $this->register;
    }

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return mixed
     */
    public function getVerify()
    {
        return $this->verify;
    }

    /**
     * @return mixed
     */
    public function getLogout()
    {
        return $this->logout;
    }

    /**
     * @return mixed
     */
    public function getReset()
    {
        return $this->reset;
    }

    /**
     * @return mixed
     */
    public function getDoReset()
    {
        return $this->do_reset;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }


}
