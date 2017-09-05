<?php
    class DataBase
    {
        /* @var DataBase|null Singleton instance of class */
        private static $instance = NULL;

        /* @var string Server IP - LOCALHOST TEST*/
        private static $servername = '127.0.0.1';

        /* @var string Server username - LOCALHOST TEST */
        private static $username = 'root';

        /* @var string Server password - LOCALHOST TEST */
        private static $password = '';

        /* @var string Database name - LOCALHOST TEST */
        private static $db_name = 'song_giver_db';

        /* @var mysqli|null Connection object to the database */
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
            $query = 'SELECT title, artist, album, category, file_name FROM Songs ORDER BY RAND() LIMIT 1';

            if ($result = $this->conn->query($query))
            {
                $receivedSong = NULL;
                while ($row = $result->fetch_assoc())
                {
                    $receivedSong = new Song($row['title'], $row['file_name'], $row['artist'], $row['album'], $row['category']);
                }

                $result->free();
                return $receivedSong;
            }
            else
            {
                throw new Exception('ERROR WHILE QUERY TO DB --- GETTING RANDOM SONG', 500);
            }
        }

        /**
         * Inserts a song into the DB
         * @param Song $newSong Song to be inserted
         */
        public function insertSong($newSong)
        {
            $stmt = $this->conn->prepare('INSERT INTO Songs (title, artist, album, category, file_name) VALUES (?, ?, ?, ?, ?)');
            $stmt->bind_param('sssss', $newSong->getTitle(), $newSong->getArtist(), $newSong->getAlbum(), $newSong->getCategory(), $newSong->getFileName());

            $stmt->execute();
            $stmt->close();
        }

        /**
         * Validates the file name if already exists (false) or not (true)
         * @param string $fileName Song file name to upload
         * @return boolean
         */
        public function validFileName($fileName)
        {
            // TODO prepare?
            $stmt = 'SELECT file_name FROM Songs WHERE file_name=' . $fileName . ' LIMIT 1';
            $result_stmt = $this->conn->query($stmt);

            return $result_stmt->num_rows >= 1 ? false : true;
        }
    }
?>
