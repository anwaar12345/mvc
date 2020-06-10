<?php

//config
require_once('config/config.php');

// require_once('lib/Core.php');
// require_once('lib/Controller.php');
// require_once('lib/Database.php');

//dynamic Libraries Loading
spl_autoload_register(function($className)
{
    require_once 'lib/'.$className.'.php';
});



?>
