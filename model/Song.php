<?php
    class Song
    {
        /* @var string Song title*/
        private $title;

        /* @var string Song path*/
        private $path;

        /* @var string Song file name*/
        private $fileName;

        /* @var string Song artist*/
        private $artist;

        /* @var string Song album*/
        private $album;

        /* @var string Song category*/
        private $category;

        /* @var string Constant server location for files*/
        private static $FIXED_PATH = '../song_collector/';

        /**
         * Constructor of song
         * @param string $title Song title
         * @param string $fileName Song file name
         * @param string $artist Song artist
         * @param string $album Song album
         * @param string $category Song category
         * @throws Exception if the params to construct a song are not correct
        */
        public function __construct($title = NULL, $fileName = NULL, $artist = 'Artist not found', $album = 'Album not found', $category = 'Category not found')
        {
            if (!is_null($title) && !empty($title) && !is_null($fileName) && !empty($fileName))
            {
                $this->title = $title;
                $this->path = self::$FIXED_PATH . $fileName;
                $this->fileName = $fileName;
                $this->artist = $artist;
                $this->album = $album;
                $this->category = $category;
            }
            else
            {
                throw new Exception('WRONG PARAMS WHILE CREATING SONG', 1);
            }
        }

        /**
         * Gets song title
         * @return string
         */
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * Gets song path
         * @return string
         */
        public function getPath()
        {
            return $this->path;
        }

        /**
         * Gets song filename
         * @return string
         */
        public function getFileName()
        {
            return $this->fileName;
        }

        /**
         * Gets song artist
         * @return string
         */
        public function getArtist()
        {
            return $this->artist;
        }

        /**
         * Gets song album
         * @return string
         */
        public function getAlbum()
        {
            return $this->album;
        }

        /**
         * Gets song category
         * @return string
         */
        public function getCategory()
        {
            return $this->category;
        }
    }
?>
