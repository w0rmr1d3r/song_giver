<?php
    define('__ROOT__', '../');
    define('__VIEW__', __ROOT__.'view/');

    require_once(__ROOT__.'model/Logger.php');
    Logger::logAction('Accessed download section');

    require_once(__VIEW__.'DownloadView.html');
?>
