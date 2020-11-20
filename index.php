<?php
require_once "utilities/autoload.php";

// monsite.fr/index.php?class=uSer&action=detailsUser2

try {
    if (isset($_GET['class']) && isset($_GET['action'])) {

        $class = ucfirst(strtolower($_GET['class']))."Controller";
        $methode = $_GET["action"];

        //controller = new UserController()
        if(method_exists($class, $methode)) {
            $controller = new $class;
            //$controller->detailsuser();
            $controller->$methode();
        } else {
            (new DefaultController())->index();
        }


    } else {
        (new DefaultController())->index();
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
    //header("Location: view/error_view.php");
    //$this->redirectTo("error_view");
}



