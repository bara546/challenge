<?php

require_once __DIR__ . '/../vendor/autoload.php';


require_once __DIR__ . '/../config/env.php';

use App\Core\Router;
$routes = require_once  '../route/route.web.php';
Router::resolve($routes);


