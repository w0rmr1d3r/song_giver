<?php
    define('__ROOT__', '../');
    define('__VIEW__', __ROOT__.'view/');
    define('__MODEL__', __ROOT__.'model/');

    require_once(__MODEL__.'DB.php');
    require_once(__MODEL__.'Song.php');

    $DB = DataBase::getInstance();
    $mySong = $DB->getRandomSong();
    $DB->closeConnection();

    if ($mySong instanceof Song)
    {
        $songTitle = $mySong->getTitle();
        $songPath = $mySong->getPath();
        $songFileName = $mySong->getFileName();
        $songArtist = $mySong->getArtist();
        $songAlbum = $mySong->getAlbum();
        $songCategory = $mySong->getCategory();

        require_once(__VIEW__.'SongGivenView.php');    
    }
    else
    {
        require_once(__VIEW__.'ErrorView.html');
    } 
?>
