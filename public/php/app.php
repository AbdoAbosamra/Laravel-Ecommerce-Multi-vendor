<?php

use A\Person;

include 'A/person.php';
include 'B/person.php';
// can i sue also include __DIR__ . '/person.php';
$person =new A\Person();
$person2 = new B\Person();
$person->name = 'hany';
$per son2->name ='ahmed';
Person::$country = 'Palestine';
$person2::$country = 'Jordan';
var_dump($person2::$country );
