<?php

class Fare
{
    // properties
    public $age;
    public $distance;
    public $fare;

    // setters
    public function setDetails($age, $distance)
    {
        $this->age = $age;
        $this->distance = $distance;
    }

    // getters
    public function getFare()
    {
        if ($this->age >= 60) {
            if ($this->distance <= 4) {
                return $this->fare = 8 * 0.8;
            } else {
                return $this->fare = (8 + ($this->distance - 4)) * 0.8;
            }
        } else {
            if ($this->distance <= 4) {
                return $this->fare = 8;
            } else {
                return $this->fare = (8 + ($this->distance - 4));
            }
        }
    }
}
