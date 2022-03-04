<!doctype html>
<html lang=" ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/style/app.mini.css">
    <title>Singer</title>
</head>

<?php

use JetBrains\PhpStorm\Pure;
use php\Album;
use php\Creator;
use php\DataProcessor;

include "../php/DataProcessor.php";
include "../php/Album.php";
include "../php/Creator.php";

$mainData = new DataProcessor();

$indexesData = DataProcessor::getIndexFromUrl();

$singerIndex = intval($indexesData["singerIndex"]);

if(array_key_exists('submit', $_POST)) {
    $mainData->addAlbum($singerIndex, Creator::createAlbum());
}

?>

<body class="singer">

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

<main class="main">
    <div class="singer__header">
        <img class="singer__img" src="<?php echo $mainData->getSinger($singerIndex)['urlAvatar'] ?>" alt="">
        <div class="singer__info">
            <div class="singer__name"><span><?php echo $mainData->getSinger($singerIndex)['singerStageName'] ?></span><ion-icon name="checkmark-circle-outline"></ion-icon></div>
            <div class="singer__des">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab, accusantium ad aliquam, aspernatur debitis est harum hic id illum iusto nisi nobis nostrum quia ratione sequi voluptatibus? Cupiditate, necessitatibus!
            </div>
        </div>
    </div>

    <div class="album__container__title">
        <?php echo $mainData->getSinger($singerIndex)['singerStageName'] ?>'s ALBUMS
    </div>

    <div class="album__container">
        <?php $mainData->renderSingerAlbumList($singerIndex); ?>
    </div>
</main>

<!--$this->albumName = $albumName;-->
<!--$this->urlAvatar = $urlAvatar;-->
<!--$this->albumDes = $albumDes;-->
<!--$this->albumPrice = $albumPrice;-->

<div id="form__container">
    <form action="#" method="post" class="form">
        <label for="albumName">
            <span>albumName</span>
            <input type="text" name="albumName">
        </label>
        <label for="urlAvatar">
            <span>urlAvatar</span>
            <input type="text" name="urlAvatar">
        </label>
        <label for="albumPrice">
            <span>albumPrice</span>
            <input type="number" name="albumPrice">
        </label>
        <label for="albumDes">
            <span>albumDes</span>
            <input type="text" name="albumDes">
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