<!doctype html>
<html lang=" ">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/style/app.mini.css">
    <title>Album</title>
</head>

<?php

use php\DataProcessor;

include "../php/DataProcessor.php";

$mainData = new DataProcessor();

?>

<body class="product">

<header class="header">
    <div class="header__menuTongue__btn">
        <ion-icon class="icon__btn" id="menuBtn" name="menu-outline"></ion-icon>
    </div>
    <div class="header__logo">
        <img src="https://cache.umusic.com/_sites/_halo/theweeknd5/images/tw-sitelogo.png" alt="">
    </div>
    <ul class="header__nav">
        <li class="header__nav__item"><a href="" id="indexNav" class="header__nav__link">HOME</a></li>
        <li class="header__nav__item"><a href="" class="header__nav__link">ALBUM</a></li>
        <li class="header__nav__item"><a href="" class="header__nav__link">SONG</a></li>
        <li class="header__nav__item"><a href="" class="header__nav__link">SINGER</a></li>
    </ul>
    <div class="header__search">
        <ion-icon class="icon__btn" id="searchBtn" name="search-outline"></ion-icon>
    </div>
</header>

<main class="main">
    <div class="album__container">
        <?php $mainData->renderAlbum() ?>
    </div>
</main>

</body>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
<!--<script src="../assets/javascript/main.js"></script>-->
</html>