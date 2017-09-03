<?php
    require_once('../model/Constants.php');

    require_once(__ROOT__.'model/Logger.php');
    Logger::logAction('Accessed upload section');

    require_once(__VIEW__.'UploadView.html');
?>
