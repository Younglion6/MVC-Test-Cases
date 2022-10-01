<?php 

class SessionClass {
    function __construct() 
    {

    }

    public function create() 
    {
        if(!isset($_SESSION)) {
            session_start();
        }
    }
    
    public function destroy() 
    {
        session_destroy();
    }
    

    public function add ($name, $value) 
    {
        if(!isset($_SESSION[$name])) {
            $_SESSION[$name] = $value;
        }
        else {
            echo "Value arealdy existing";
        }
    }


    public function remove($name) 
    {
        if(isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
        } 
        else {
            echo "Not  found";
        }
    }


    public function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return null;
    }

    public function accessible($user, $page)
    {

                          

    }
}
?>