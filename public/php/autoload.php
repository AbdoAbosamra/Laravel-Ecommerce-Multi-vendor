<?php
# Here i can define the ceriteria that can make me load or import classes
// callback function
function load_class ($className)
{
    include $className . '.php';
}
spl_autoload_register('load_class');

// can i also use it as anonymous function or clouser function
