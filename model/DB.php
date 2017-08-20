<?php
    class DataBase
    {

        private static $instance = NULL;
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
            self::$instance = NULL;
        }

        /**
         * Gets a random song from the DB
         * @return Song
         */
        public function getRandomSong()
        {
            $songID = 1; /* RANDOM THIS */

            /* Statement to execute */
            $stmt = $this->conn->prepare("SELECT title, artist, album, category, path FROM Songs WHERE id=?");

            /* Bind params to the stmt */
            $stmt->bind_param('i', $songID);

            //unset($songID);

            /* Execute stmt */
            $stmt->execute();

            /* Link variables to the stmt */
            $stmt->bind_result($title, $artist, $album, $category, $path);

            /* Obtain data */
            while($stmt->fetch())
            {
                $songTitle;
                $songArtist;
                $songAlbum;
                $songCategory;
                $songPath;
            }

            /* Closes stmt and connection */
            $stmt->close();

            return (new Song($songTitle, $songPath, $songArtist, $songAlbum, $songCategory));

        }

        /**
         * TEST Gets a song
         * @return Song
         */
        public function getSongTest()
        {
            require_once('Song.php');
            return (new Song('Hooked on a feeling', '../song_collector/song-one.mp3', 'Blue Swede'));
        }
    }
?>
