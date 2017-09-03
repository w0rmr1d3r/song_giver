<?php
    define('__ROOT__', '../');
    define('__VIEW__', __ROOT__.'view/');

    require_once(__ROOT__.'model/Logger.php');
    Logger::logAction('hello world');

    require_once(__VIEW__.'AboutView.html');
?>
