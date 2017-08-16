<?php
    class Song
    {
        private $title;
        private $path;
        private $fileName;
        private $artist;
        private $album;
        private $category;

        /**
         * Constructor of song
         * @param string $title Song title
         * @param string $artist Song artist
         * @param string $album Song album
         * @param string $category Song category
         * @param string $path Song path
        */
        public function __construct($title = NULL, $path = NULL, $artist = 'Artist not found', $album = 'Album not found', $category = 'Category not found')
        {
            if (!is_null($title) && $title != '' && !is_null($path) && $path != '')
            {
                $this->title = $title;
                $this->path = $path;
                $this->fileName = $title.'.mp3';
                $this->artist = $artist;
                $this->album = $album;
                $this->category = $category;

            }
            else
            {
                throw new Exception("Error Processing Request --- CREATING SONG", 1);
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
