/*
 JavaScript custom library functions
 Made by w0rmr1d3r
*/

/*
 Global vars
*/
/* Current selected section, by default download section */
var currentSelected = 'custom-download-li';

/**
 * Gets an object XMLHTTP for each browser
 * @return {XMLHttpRequest || ActiveXObject}
 */
function getXMLHTTP() {
    return (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
}

/**
 * Sets colour for the selected section
 */
function setSelectedSection(selected) {
    document.getElementById(currentSelected).style.backgroundColor = '';
    document.getElementById(selected).style.backgroundColor = '#B6F5E0';
    currentSelected = selected;
}

/**
 * Gets a song from the controller
 */
function getSong() {
    var xmlhttp = getXMLHTTP();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var songDiv = document.getElementById('custom-main-container');
            songDiv.innerHTML += xmlhttp.responseText;
        }
    };
    xmlhttp.open('POST', '../controller/RandomSongController.php');
    xmlhttp.send();
}

/**
 * Gets the upload view
 */
function getUploadView() {
    var xmlhttp = getXMLHTTP();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var div = document.getElementById('custom-main-container');
            div.innerHTML = xmlhttp.responseText;
            document.getElementById('song-title-input').focus();
        }
    };
    xmlhttp.open('POST', '../controller/UploadSongController.php');
    xmlhttp.send();

    setSelectedSection('custom-upload-li');
}

/**
 * Gets the download view
 */
function getDownloadView() {
    var xmlhttp = getXMLHTTP();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var div = document.getElementById('custom-main-container');
            div.innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open('POST', '../controller/DownloadSongController.php');
    xmlhttp.send();

    setSelectedSection('custom-download-li');
}

/**
 * Gets the about view
 */
function getAboutView() {
    var xmlhttp = getXMLHTTP();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var div = document.getElementById('custom-main-container');
            div.innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open('POST', '../controller/AboutController.php');
    xmlhttp.send();

    setSelectedSection('custom-about-li');
}

/**
 * Uploads a song to the server
 */
function uploadSong() {
    console.log('UPLOAD SONG UNDER CONSTRUCTION');

    // TODO check params here
    
    var xmlhttp = getXMLHTTP();

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var div = document.getElementById('custom-main-container');
            div.innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open('POST', '../controller/UploadController.php');
    xmlhttp.send();
}

/* When document is ready, by default give download view */
$('document').ready(
    function() {
        getDownloadView();
    }
);
