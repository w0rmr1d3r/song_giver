<?php
    define('__ROOT__', '../');
    define('__VIEW__', __ROOT__.'view/');

    require_once(__ROOT__.'model/Logger.php');
    Logger::logAction('Accessed index section');

    require_once(__VIEW__.'Head.html');
    require_once(__VIEW__.'Foot.html');
?>
