<?php

namespace B;
class Person
{

    const MALE = 'm';
    const FEMALE = 'F';
    // can i have also for const acess modifier
    public $name; // in php 8 can not be un direct should be direct not come form any function or any execution can not be initial value
    // But in contructor can i do that
    protected $gender;
    private $age;
    public static $country;
    public function __construct(){
        echo __CLASS__;
    }
    public function setAge($age)
    {
        $this->age = $age;
        return $this; // usualy we return this so we can use method chaning
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    public static function setCountry($country)
    {
        // can not use this in static method
        self::$country = $country; // The different of static and other
//         $g = self::MALE ; // i can use it also for constants variables
    }
}

