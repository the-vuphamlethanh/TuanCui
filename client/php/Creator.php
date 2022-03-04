<?php

namespace php;

use JetBrains\PhpStorm\Pure;

include "./Album.php";
include "./Song.php";

class Creator
{

    public static function createAlbum(): Album{
        $albumName = $_REQUEST['albumName'];
        $urlAvatar = $_REQUEST['urlAvatar'];
        $albumDes = $_REQUEST['albumDes'];
        $albumPrice = $_REQUEST['albumPrice'];
        return new Album($albumName, $urlAvatar, $albumDes, $albumPrice);
    }

    public static function createSong(): Song{
        $songName = $_REQUEST['songName'];
        $urlAvatar = $_REQUEST['urlAvatar'];
        $iframeSpotify = $_REQUEST['iframeSpotify'];
        $category = $_REQUEST['category'];
        $lyric = $_REQUEST['lyric'];
        return new Song($songName, $urlAvatar, $iframeSpotify, $category, $lyric);
    }


}