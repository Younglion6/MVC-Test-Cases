<?php

abstract class Model 
{

    abstract protected function getAll() : array;
    abstract protected function getRecord(string $id):  array;
 
}

class ConcreteModelClass extends Model 
{

    public function getAll() : array
    {
        // read the json file 
        $json = file_get_contents('C:\xampp\htdocs\413001842\data/users.json');

        // decode the json file
        $json_data = json_decode($json, true);

        // return the data
        return ($json_data);

    }

    public function getRecord(string $id): array
    {
        // read the json file 
        $json = file_get_contents('C:\xampp\htdocs\413001842\data/users.json');

        // decode the json file
        $json_data = json_decode($json, true);

        $this->id = $id;

        //return single database record 
        echo $json_data[$id];
    }
}
    



    
    





   
