<?php

function my_autoloader($class)
{
    if(file_exists("utilities/$class.php"))
    {
        require_once "utilities/$class.php";

    } elseif (file_exists("modeles/$class.php"))
    {
        require_once "modeles/$class.php";

    } elseif (file_exists("controllers/$class.php"))
    {
        require_once "controllers/$class.php";

    } else {
        throw new Exception("Cette class $class n'existe pas");
    }
}

spl_autoload_register('my_autoloader');
