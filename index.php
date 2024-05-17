<?php
    require './controllers/client/BaseController.php';
    require './core/Database.php';
    require './models/BaseModel.php';

    $controllerName = ucfirst(strtolower($_REQUEST['controller'] ?? 'Home')) . 'Controller';
    $actionName = strtolower($_REQUEST['action'] ?? 'login');
    require "./controllers/client/$controllerName.php";

    $controllerObj = new $controllerName();
    $controllerObj->$actionName();