<?php

require 'config.php';
require 'util/auth.php';

function __autoload($class) 
{
    require LIBS.$class.".php"; // double quotes!!!
}
$app = new App();
$app->init();
