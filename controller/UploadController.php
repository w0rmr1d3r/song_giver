<?php
    require_once('../model/Constants.php');
    /**
     * Function anti-XSS, returns correct data
     * @param string $data Data received
     * @return string
     */
    function cleanInput($data)
    {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    require_once(__ROOT__.'model/Logger.php');
    Logger::logAction('Trying to upload file');

    if(isset($_POST['submit']))
    {
        Logger::logAction('Upload detected');
        require_once(__MODEL__.'DB.php');

        $DB = DataBase::getInstance();

        Logger::logAction('Connected to DB, receiving params...');
        
        $title = preg_replace('(/^[a-zA-Z0-9 "!?.-]+$/)', '', cleanInput($_POST['song-title-input']));
        $artist = preg_replace('(/^[a-zA-Z0-9 "!?.-]+$/)', '', cleanInput($_POST['song-artist-input']));
        $album = preg_replace('(/^[a-zA-Z0-9 "!?.-]+$/)', '', cleanInput($_POST['song-album-input']));
        $category = preg_replace('(/^[a-zA-Z "!?.-]+$/)', '', cleanInput($_POST['song-category-input']));

        $fileName = $_FILES['song-file-input']['name'];
        $uploadDirectory = __ROOT__ . 'song_collector/';
        $uploadPath = $uploadDirectory . basename($fileName);
        $fileType = pathinfo($uploadPath, PATHINFO_EXTENSION);
        $fileSize = $_FILES['song-file-input']['size'];

        Logger::logAction('Params received, starting error checking');

        $error = false;
        $message = 'FILE UPLOADED CORRECTLY';

        if (is_null($title) || empty($title))
        {
            $message = 'WRONG TITLE';
            $error = true;
            Logger::logError('WRONG TITLE DETECTED');
        }

        if (!$DB->validFileName($fileName) || file_exists($uploadPath))
        {
            $message = 'FILE ALREADY EXISTS';
            $error = true;
            Logger::logError('FILE ALREADY EXISTS');
        }

        if (($fileSize > MAX_FILE_SIZE) || ($fileSize <= MIN_FILE_SIZE))
        {
            $message = 'WRONG FILE SIZE';
            $error = true;
            Logger::logError('FILE SIZE OUTSIDE LIMITS');
        }

        if ($fileType != 'mp3' && $fileType != 'wav')
        {
            $message = 'WRONG FILE EXTENSION';
            $error = true;
            Logger::logError('TRIED TO UPLOAD NON-AUDIO FILE');
        }

        if (!$error)
        {
            Logger::logAction('No error detected so far, trying to upload file now');
            if (move_uploaded_file($_FILES['song-file-input']['tmp_name'], $uploadPath))
            {
                require_once(__MODEL__.'Song.php');
                $DB->insertSong(new Song($title, $fileName, $artist, $album, $category));
                Logger::logAction('File uploaded and inserted into DB');
            }
            else
            {
                $message = 'ERROR WHILE UPLOADING FILE';
                Logger::logError('ERROR WHILE UPLOADING FILE');
            }
        }
        require_once(__VIEW__.'UploadFileConfirmation.php');
    }
    else
    {
        Logger::logError('Tried to upload file without POST');
        require_once(__VIEW__.'ErrorView.html');
    }
?>
