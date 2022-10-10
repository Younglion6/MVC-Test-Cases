<?php

abstract class Model 
{

    protected $cashed_json = [];
    abstract protected function getAll() : array;
    abstract protected function getRecord(string $id):  array;
 
}

class ConcreteModelClass extends Model 
{

    public function getAll() : array
    {
        // read the json file 
        $json = file_get_contents('./data/users.json');

        // decode the json file
        $json_data = json_decode($json, true);

        // return the data
        return ($json_data);

    }

    public function getRecord(string $id): array
    {
        // read the json file 
        $json = file_get_contents('./data/users.json');

        // decode the json file
        $json_data = json_decode($json, true);

        $this->id = $id;

        //return single database record 
        echo $json_data[$id];

    }

    public function loadData(string $fromFile) : array
    {
        $filename = basename($fromFile, 'json');
        if (!isset($this->cached_json[$filename]) || empty($this-cached_json[$filename])) {
            $this->cached_json[$filename] = json_decode($json_file, true);
        }
        return $this->cached_json[$filename];
    }
}
    


    
    





   
