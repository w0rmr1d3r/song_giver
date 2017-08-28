<?php
    class DataBase
    {

        private static $instance = NULL;
        private static $servername = '127.0.0.1'; /* LOCALHOST TEST */
        private static $username = 'root'; /* LOCALHOST TEST */
        private static $password = ''; /* LOCALHOST TEST */
        private static $db_name = 'song_giver_db'; /* LOCALHOST TEST */
        private $conn;
  
        /**
         * Creates the object and the DB connection
         */
        private function __construct()
        {
            $this->conn = new mysqli(self::$servername, self::$username, self::$password, self::$db_name);

            if ($this->conn->connect_error)
            {
                die('Connection failed: ' . $this->conn->connect_error);
            }
        }
         
        /**
         * Gets instance of Singleton DB
         * @return DataBase
         */
        public static function getInstance()
        {
            if (is_null(self::$instance))
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
         * It does not use prepared stmt since the query has no external input
         * @return Song
         * @throws Exception if the query cannot be done
         * @throws Exception if the song cannot be created
         */
        public function getRandomSong()
        {
            $query = 'SELECT title, artist, album, category, path FROM Songs ORDER BY RAND() LIMIT 1';
            
            if ($result = $this->conn->query($query))
            {
                while ($row = $result->fetch_assoc())
                {
                    $receivedSong = new Song($row['title'], $row['path'], $row['artist'], $row['album'], $row['category']);
                }

                $result->free();
                return $receivedSong;
            }
            else
            {
                throw new Exception('ERROR WHILE QUERY TO DB --- GETTING RANDOM SONG', 500);
            }
        }
    }
?>
