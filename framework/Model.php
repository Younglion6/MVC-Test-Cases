<?php

abstract class Model 
{

    protected $cashed_json = [];
    abstract  function getAll() : array;
    abstract  function getRecord(string $id):  array;
 

    public function loadData(string $fromFile) : array
    {
        $filename = basename($fromFile, '.json');
        if (!isset($this->cached_json[$filename]) || empty($this->cached_json[$filename])) {
            $json_file=file_get_contents($fromFile);
            $this->cached_json[$filename] = json_decode($json_file, true);
        }
		return $this->cached_json[$filename];
    }
}
    


    
    





   
