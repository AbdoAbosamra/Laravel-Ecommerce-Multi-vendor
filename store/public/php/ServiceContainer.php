<?php
// In This class will show the idea of the ServiceContainer
class ServiceContainer
{
    protected $container = [];
    public function bind($name , $instance){  //  The idea of binding
        $this->container[$name] = $instance;
    }
    public function make($name){ // the idea of making - to return
        return $this->container[$name];
    }
}
