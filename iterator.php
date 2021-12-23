<?php
class IntegerIterator implements Iterator {

    private $i;

    public function __construct($start, $end, $step = 1) {
        $this -> start = $i = $start;
        $this -> end = $end;
        $this -> step = $step;
    }

    public function rewind() {
        $this -> i = 0;
    }

    public function valid() {
        return $this -> i < $this -> end;
    }

    public function current() {
        return $this -> i;
    }

    public function key() {
        return $this -> i;
    }

    public function next() {
        $this -> i = $this -> step;
    }
}

foreach(new IntegerIterator(0, 10) as $number) {

}
?>