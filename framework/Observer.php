<?php

abstract class AbstractObserver {

    abstract function update(AbstractSubject $subject_in);
}


abstract class AbstractSubject {

    abstract function attach(AbstractObserver $observer_in);
    abstract function detach(AbstractObserver $observer_in);
    abstract function notify();
}


class PatternObserver extends AbstractObserver {

    public function __construct() {

    }

    public function update(AbstractSubject $subject) {
        $subject->getPattern();
    }
}


class PatternSubject extends AbstractSubject {
    private $newPattern = NULL;
    private $observers = array();
    function __construct() {
    }

    function attach(AbstractObserver $oberver_in) {
        $this->observers[] = $observer_in;
    }

    function detach(AbstractObserver $observer_in) {
        //$key = array_search($observer_in, $this->observers);
        foreach($this->observers as $okey => $oval) {
          if ($oval == $observer_in) { 
            unset($this->observers[$okey]);
          }
        }
      }
      function notify() {
        foreach($this->observers as $obs) {
          $obs->update($this);
        }
      }
      function updatePattern($newPattern) {
        $this->pattern = $newPattern;
        $this->notify();
      }
      function getPattern() {
        return $this->pattern;
      }
    }