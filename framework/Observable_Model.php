<?php
abstract class Obserable_Model extends Model implements Observer_Interface
{
    protected $observers = [];

    protected $updateddata = [];

    public function attach(Observer_Interface $o)
    {
        $this->observers[] = $o;
    }

    public function detach(Observer_Interface $o)
    {
        $this->observers = array_filter($this->observers, function ($a) use ($o) {
            return (! ($a === $o));
        });
    }

    public function notify()
    {
        foreach ($this->observers as $ob) {
            $ob->update($this);
        }
    }

    /**
     * Method for passing the changed data
     */
    public function giveUpdate()
    {
        return $this->updateddata;
    }

    public function updateTheChangedData(array $d)
    {
        $this->updateddata = $d;
    }

    abstract public function getAll() : array;

    abstract public function getRecord(string $id) : array;
}