<?php


class View implements Observer_Interface
{

    private $tpl = '';                         // this will hold the name of the tpl file to open i.e the body of the webpage
    private $vars = [];
    

    public function setTemplate(string $filename)
    {
        if(!file_exists($filename)) {
            trigger_error('Invalid template given (' . $filename . ') No such file found', E_USER_ERROR);
            exit;
        }
        $this->tpl = $filename;
        //return $filename;
        
    }


    public function display(): String 
    {
        extract($this->data);
        return $this->tpl;
    }


    public function addVar(string $name, $value)
    {
        // checks for valid variable name 
        if (preg_match('/^[a-zA-Z_\x80-\xff][a-zA-z0-9_\80-\xff]*$/', $name) == 0) {
            trigger_error('Invalid varibale name used', E_USER_ERROR);
        }
        $this->vars[$name] = $value;     // else assign the value to the array
    
    }

    public function update(Observable_Model $obs)
    {
        $rec = $obs->giveUpdate();
        foreach ($rec as $k=>$r) {
            $this->addVar($k, $r);
        }
        $this->display();
    }
}