<?php
    /**
     * Function anti-XSS, returns correct data
     * @param string $data Data received
     * @return string
     */
    function cleanInput($data)
    {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    if($_POST)
    {
        require_once('../model/Constants.php');
        require_once(__MODEL__.'DB.php');

        $DB = DataBase::getInstance();

        $title = preg_replace('(/^[a-zA-Z0-9 "!?.-]+$/)', '', cleanInput($_POST['song-title-input']));
        $artist = preg_replace('(/^[a-zA-Z0-9 "!?.-]+$/)', '', cleanInput($_POST['song-artist-input']));
        $album = preg_replace('(/^[a-zA-Z0-9 "!?.-]+$/)', '', cleanInput($_POST['song-album-input']));
        $category = preg_replace('(/^[a-zA-Z "!?.-]+$/)', '', cleanInput($_POST['song-category-input']));

        $fileName = $_FILES['song-file-input']['name'];
        $uploadDirectory = __ROOT__ . 'song_collector/';
        $uploadPath = $target_dir . basename($fileName);
        $fileType = pathinfo($uploadPath, PATHINFO_EXTENSION);
        $fileSize = $_FILES['song-file-input']['size'];

        $error = false;
        $message = 'FILE UPLOADED CORRECTLY';

        if (is_null($title) || empty($title))
        {
            $message = 'WRONG TITLE';
            $error = true;
        }

        if (!$DB->validFileName($fileName) || file_exists($uploadPath))
        {
            $message = 'FILE ALREADY EXISTS';
            $error = true;
        }

        if (($fileSize > MAX_FILE_SIZE) || ($fileSize <= MIN_FILE_SIZE))
        {
            $message = 'WRONG FILE SIZE';
            $error = true;
        }

        if ($imageFileType != 'mp3' && $imageFileType != 'wav')
        {
            $message = 'WRONG FILE EXTENSION';
            $error = true;
        }

        if (!$error)
        {
            if (move_uploaded_file($_FILES['song-file-input']['tmp_name'], $uploadPath))
            {
                $DB->insertSong(new Song($title, $fileName, $artist, $album, $category));
            }
            else
            {
                $message = 'ERROR WHILE UPLOADING FILE';
            }
        }
        require_once(__VIEW__.'UploadFileConfirmation.php');
    }
    else
    {
        require_once(__VIEW__.'ErrorView.html');
    }
?>
