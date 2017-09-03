<?php
    require_once('../model/Constants.php');

    require_once(__ROOT__.'model/Logger.php');
    Logger::logAction('Accessed about section');

    require_once(__VIEW__.'AboutView.html');
?>
