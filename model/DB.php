<?php
    class DataBase
    {

        private static $instance = null;
        private static $servername = '';
        private static $username = '';
        private static $password = '';
        private $conn;
  
        /**
         * Creates the object and the DB connection
         */
        private function __construct()
        {
            /*$this->conn = new mysqli(self::$servername, self::$username, self::$password);

            if ($this->conn->connect_error)
            {
                die("Connection failed: " . $this->conn->connect_error);
            }*/
        }
         
        /**
         * Gets instance of Singleton DB
         * @return DataBase
         */
        public static function getInstance()
        {
            if (self::$instance == null)
            {
                self::$instance = new DataBase();
            }
         
            return self::$instance;
        }

        /**
         * Closes connection and destroys self instance
         * @return void
         */
        public function closeConnection()
        {
            $this->conn->close();
            self::$instance = null;
        }

        /**
         * TEST Gets a song
         * @return Song
         */
        public function getSongTest()
        {
            require_once('Song.php');
            return (new Song('My super song', '../song_collector/song-one.mp3', 'Blue Swede'));
        }
    }
?>
