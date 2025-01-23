<?php

if(!isset($_SESSION))
    session_start();

include_once("inc/database.php");

$page = $_GET["page"];
$indexUrl = "/ordering-tablet/";

$isLoggedIn = $_SESSION["isLoggedIn"]??false;

include "views/header.php";

switch ($page) {
    case "":
    case "/":
        if(!$isLoggedIn)
            header("Location: " . $indexUrl . "login");
        include "views/panel.php";
        break;
        
    case "login":
        if($isLoggedIn)
            header("Location: " . $indexUrl);
        include "views/login.php";
        break;

    case "logout":
        session_destroy();
        header("Location: " . $indexUrl);
        break;

    default:
        http_response_code(404);
        include "views/404.php";
}

include "views/footer.php";
