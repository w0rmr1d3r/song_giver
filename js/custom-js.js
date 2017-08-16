// TODO --- comments


function getXMLHTTP() {
    return (window.XMLHttpRequest ? 
    	new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP"));
}

function getSong() {
	var xmlhttp = getXMLHTTP();

	xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        {
            var songDiv = document.getElementById('custom-song-given-div');
            songDiv.style.display = 'block';
            songDiv.innerHTML = xmlhttp.responseText;
		}
	};
	xmlhttp.open('POST', '../controller/RandomSongController.php');
    xmlhttp.send();
}

function downloadSong() {
	console.log('TODO --- DOWNLOAD SONG');
}
