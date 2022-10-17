<?php 

class SessionManager 
{
    protected $access = ['profile'=>['testuser', 'jonno', 'tara']];


    public static function create() 
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
        // check to make sure the variable name is valid
		if (preg_match('/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*$/', $name) == 0) {
			trigger_error('Invalid variable name used', E_USER_ERROR);
		}
		$_SESSION[$name] = $value;
        
    }


    public function remove($name) 
    {
        if(isset($_SESSION[$name])) {
            unset($_SESSION[$name]);
        } 
    }


    public function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return null;
    }

    public function accessible($user, $page): bool
    {
        if(in_array($user, $this->access[$page])) {
            return true;
        }
        return false;
                        
    }
}
?>