<?php


class View  {

    private $tpl;                         // this will hold the name of the tpl file to open i.e the body of the webpage
    protected $vars = array();
    


    public function __contruct()        // when creating a view you must pass tpl and data
    {
        $this->view = $view;
            // this is the name of the file to be created
           // template function to store the set template file before passing it to display Function()
    }


    public function setTemplate(string $filename)
    {

        $this->tpl = $filename;
        //return $filename;
        
    }


    public function display(): String 
    {
        return $this->tpl;
    }


    public function addVar(string $name, $value)
    {
        if(is_object($value))
        {
            $this->vars[$name] = $value->fetch();
        }
        
        $this->vars[$name] = $value;     // else assign the value to the array
    
    }
}