/*
 JavaScript custom library functions
 Made by w0rmr1d3r
*/

/**
 * Gets an object XMLHTTP for each browser
 * @return {XMLHttpRequest || ActiveXObject}
 */
function getXMLHTTP() {
    return (window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
}

/**
 * Gets a song from the controller
 */
function getSong() {
    var xmlhttp = getXMLHTTP();

    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
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

    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            var div = document.getElementById('custom-main-container');
            div.innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open('POST', '../controller/UploadSongController.php');
    xmlhttp.send();
}

/**
 * Gets the download view
 */
function getDownloadView() {
    var xmlhttp = getXMLHTTP();

    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            var div = document.getElementById('custom-main-container');
            div.innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open('POST', '../controller/DownloadSongController.php');
    xmlhttp.send();
}

/**
 * Gets the about view
 */
function getAboutView() {
    var xmlhttp = getXMLHTTP();

    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            var div = document.getElementById('custom-main-container');
            div.innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open('POST', '../controller/AboutController.php');
    xmlhttp.send();
}

/**
 *
 */
function uploadSong() {
    console.log('UPLOAD SONG UNDER CONSTRUCTION');
}

/* When document is ready, by default give download view */
$('document').ready(getDownloadView());
