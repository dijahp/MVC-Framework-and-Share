<?php

// Load config
require_once 'config/config.php';


// Auto Load Core Libs

spl_autoload_register(function($className) {
    require_once 'library/' . $className . '.php';

});