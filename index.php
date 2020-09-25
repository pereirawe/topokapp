<?php
    // require_once('./Route.php');
    // require_once './App/Views/index.php';
    require_once './App/Routes.php';
    $request = new Route;
    $request->listen();

?>