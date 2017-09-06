<div class="card" id="custom-song-given-div">
    <div class="card-body">
        <h4 class="card-title" title="Title"><?php echo $songTitle; ?></h4>
        <ul class="list-group">
            <li class="list-group-item" title="Artist">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <?php echo $songArtist; ?>
            </li>
            <li class="list-group-item" title="Album">
                <span class="glyphicon glyphicon-cd" aria-hidden="true"></span>
                <?php echo $songAlbum; ?>
            </li>
            <li class="list-group-item" title="Category">
                <span class="glyphicon glyphicon-music" aria-hidden="true"></span>
                <?php echo $songCategory; ?>
            </li>
        </ul>
<?php
    echo '
        <a 
            href="'.$songPath.'"
            download="'.$songFileName.'" 
            class="btn btn-primary"
            title="DOWNLOAD PLS"
        >
            DOWNLOAD SONG
            <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
        </a>
    ';
?>
    </div>
</div>
