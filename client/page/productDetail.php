<!doctype html>
<html lang=" ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/style/app.mini.css">
    <title>Album Detail</title>
</head>

<?php

use JetBrains\PhpStorm\Pure;
use php\Album;
use php\Creator;
use php\DataProcessor;use php\Song;

include "../php/Album.php";
include "../php/Song.php";
include "../php/Creator.php";
include "../php/Category.php";
include "../php/CategoryList.php";
include "../php/DataProcessor.php";
//include "../data/cates.json";

$mainData = new DataProcessor();

$indexesData = DataProcessor::getIndexFromUrl();

$singerIndex = intval($indexesData["singerIndex"]);
$albumIndex = intval($indexesData["albumIndex"]);

//function createSong(): Song{
//    $songName = $_REQUEST['songName'];
//    $urlAvatar = $_REQUEST['urlAvatar'];
//    $iframeSpotify = $_REQUEST['iframeSpotify'];
//    $category = $_REQUEST['category'];
//    $lyric = $_REQUEST['lyric'];
//    return new Song($songName, $urlAvatar, $iframeSpotify, $category, $lyric);
//}

if(array_key_exists('submit', $_POST)) {
    $mainData->addSong($singerIndex, $albumIndex, Creator::createSong());
}

?>

<body class="albumDetail">

<header class="header">
    <div class="header__menuTongue__btn">
        <ion-icon class="icon__btn" id="menuBtn" name="menu-outline"></ion-icon>
    </div>
    <div class="header__logo">
        <img src="https://cache.umusic.com/_sites/_halo/theweeknd5/images/tw-sitelogo.png" alt="">
    </div>
    <ul class="header__nav">
        <li class="header__nav__item"><a href="" class="header__nav__link">HOME</a></li>
        <li class="header__nav__item"><a href="" class="header__nav__link">ALBUM</a></li>
        <li class="header__nav__item"><a href="" class="header__nav__link">SONG</a></li>
        <li class="header__nav__item"><a href="" class="header__nav__link">SINGER</a></li>
    </ul>
    <div class="header__search">
        <ion-icon class="icon__btn" id="searchBtn" name="search-outline"></ion-icon>
    </div>
</header>

<div class="fakeGap">

</div>

<main class="main">
    <img class="albumDetail__img" src="<?php echo $mainData->getAlbum($singerIndex, $albumIndex)['urlAvatar'] ?>" alt="">
    <div class="albumDetail__des">
        <div class="albumDetail__des__name"><?php echo $mainData->getAlbum($singerIndex, $albumIndex)['albumName'] ?></div>
        <a href="./singer.php?singerIndex=<?php echo $singerIndex ?>" class="albumDetail__des__singer">
            <img src="<?php echo $mainData->getSinger($singerIndex)['urlAvatar'] ?>" class="albumDetail__des__singer__img" alt="">
            <div class="albumDetail__des__singer__name"><span><?php echo $mainData->getSinger($singerIndex)['singerName'] ?></span><ion-icon name="checkmark-circle-outline"></ion-icon></div>
        </a>
        <div class="albumDetail__des__price"><?php echo $mainData->getAlbum($singerIndex, $albumIndex)['albumPrice'] ?>$</div>
        <div class="albumDetail__des__category">
            <?php echo $mainData->getCategoryAlbum($singerIndex, $albumIndex); ?>
        </div>
        <div class="albumDetail__songList">
            <?php $mainData->renderSongList($mainData->getSongList($singerIndex, $albumIndex)) ?>
        </div>
    </div>
</main>

<div id="form__container">
    <form action="#" method="post" class="form">
        <label for="songName">
            <span>songName</span>
            <input type="text" name="songName">
        </label>
        <label for="urlAvatar">
            <span>urlAvatar</span>
            <input type="text" name="urlAvatar">
        </label>
        <label for="iframeSpotify">
            <span>iframeSpotify</span>
            <input type="text" name="iframeSpotify">
        </label>
        <label for="category">
            <span>category</span>
            <select name="category" id="">
                <option value="01">Acoustic</option>
                <option value="02">Bolero</option>
                <option value="03">Remix</option>
                <option value="04">POP</option>
                <option value="05">Jazz</option>
                <option value="06">EDM</option>
                <option value="07">Kpop</option>
                <option value="08">Ballad</option>
                <option value="09">Rap</option>
                <option value="10">Folk</option>
            </select>
        </label>
        <label for="lyric">
            <span>lyric</span>
            <textarea type="text" name="lyric">
            </textarea>
        </label>
        <button name="submit" type="submit">SUBMIT</button>
    </form>
</div>

<div id="form__btn" data-text="ADD">
    ADD
</div>

</body>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
<script src="../assets/javascript/main.js"></script>
</html>