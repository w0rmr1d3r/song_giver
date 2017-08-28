<?php
    define('__ROOT__', '../');
    define('__VIEW__', __ROOT__.'view/');
    define('__MODEL__', __ROOT__.'model/');

    require_once(__MODEL__.'DB.php');
    require_once(__MODEL__.'Song.php');

    $DB = DataBase::getInstance();
    
    try
    {
        $mySong = $DB->getRandomSong();

        $songTitle = $mySong->getTitle();
        $songPath = $mySong->getPath();
        $songFileName = $mySong->getFileName();
        $songArtist = $mySong->getArtist();
        $songAlbum = $mySong->getAlbum();
        $songCategory = $mySong->getCategory();

        require_once(__VIEW__.'SongGivenView.php');
    }
    catch (Exception $e)
    {
        // LOG EXCEPTION
        // $e->getMessage() . $e->getCode() . $e->getFile() . $e->getLine();
        require_once(__VIEW__.'ErrorView.html');
    }
    finally
    {
        $DB->closeConnection();
    }
?>
