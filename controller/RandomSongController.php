<?php
    require_once('../model/Constants.php');

    require_once(__ROOT__.'model/Logger.php');
    Logger::logAction('Accessed download song section');

    require_once(__MODEL__.'DB.php');
    require_once(__MODEL__.'Song.php');

    $DB = DataBase::getInstance();

    Logger::logAction('Connecting to DB...');
    
    try
    {
        Logger::logAction('Getting song from DB...');

        $mySong = $DB->getRandomSong();

        if (!is_null($mySong))
        {
            $songTitle = $mySong->getTitle();
            $songPath = $mySong->getPath();
            $songFileName = $mySong->getFileName();
            $songArtist = $mySong->getArtist();
            $songAlbum = $mySong->getAlbum();
            $songCategory = $mySong->getCategory();

            Logger::logAction('Song is: ' . $songTitle);

            Logger::logAction('Accessed info about song section');

            require_once(__VIEW__.'SongGivenView.php');
        }
        else
        {
            Logger::logError('Error while getting song - SONG WAS NULL');
            require_once(__VIEW__.'ErrorView.html');
        }
    }
    catch (Exception $e)
    {
        Logger::logError('Error while getting song' . $e->getMessage() . $e->getCode() . $e->getFile() . $e->getLine());
        require_once(__VIEW__.'ErrorView.html');
    }
    finally
    {
        Logger::logAction('Closing DB connection');
        $DB->closeConnection();
    }
?>
