<?php
      define('__ROOT__', '../');
      define('__VIEW__', __ROOT__.'view/');
      define('__MODEL__', __ROOT__.'model/');

      require_once(__MODEL__.'DB.php');
      require_once(__MODEL__.'Song.php');

      // song given
      $DB = DataBase::getInstance();
      $mySong = $DB->getSongTest();

      $songTitle = $mySong->getTitle();
      $songPath = $mySong->getPath();
      $songFileName = $mySong->getFileName();
      $songArtist = $mySong->getArtist();
      $songAlbum = $mySong->getAlbum();
      $songCategory = $mySong->getCategory();

      // song given view + download button
      require_once(__VIEW__.'SongGivenView.php');

      /*
      // Random song with DB
      $DB = DataBase::getInstance();
      $mySong = $DB->getRandomSong();
      $DB->closeConnection();

      $songTitle = $mySong->getTitle();
      $songPath = $mySong->getPath();
      $songFileName = $mySong->getFileName();
      $songArtist = $mySong->getArtist();
      $songAlbum = $mySong->getAlbum();
      $songCategory = $mySong->getCategory();

      // song given view + download button
      require_once(__VIEW__.'SongGivenView.php');
      */
?>
