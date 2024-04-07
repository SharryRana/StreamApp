<?php
// Load configuration
require_once('../config/routes.php');

// Parse URL
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

// Route the request
$route = $request_uri[0];
if (array_key_exists($route, $routes)) {
    $controller_action = $routes[$route];
    list($controller_name, $action) = explode('@', $controller_action);
    require_once("../app/Controllers/$controller_name.php");
    $controller = new $controller_name();
    $controller->$action();
} else {
    // Handle 404 error
    echo "404 Not Found";
}
?>
