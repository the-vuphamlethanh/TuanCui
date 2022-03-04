<?php

namespace php;

//use php;

use mysql_xdevapi\Exception;

include "./Album.php";
include "./Singer.php";
include "./Category.php";
include "./Song.php";
include "./Creator.php";
include "./CategoryList.php";


class DataProcessor
{

    private array $mainData;

    public function __construct()
    {
        $this->mainData = json_decode(file_get_contents('../data/mainData.json'), true);
    }

    public static function getIndexFromUrl(){
        $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $components = parse_url($actual_link);
        parse_str($components['query'], $results);
        return $results;
    }

    public function getSinger(int $singerIndex){
        return $this->mainData[$singerIndex];
    }

    public function getAlbumList(int $singerIndex){
        return $this->mainData[$singerIndex]["albumList"];
    }

    public function getAlbum(int $singerIndex, int $albumIndex){
        return $this->getAlbumList($singerIndex)[$albumIndex];
    }

    public function getSongList(int $singerIndex, int $albumIndex){
        return $this->getAlbumList($singerIndex)[$albumIndex]["songList"];
    }

    public function getCategoryAlbum(int $singerIndex, int $albumIndex): string
    {
        $album = $this->getAlbum($singerIndex, $albumIndex);
        $categoryList = new CategoryList();
        $result = "";
        foreach ($album["songList"] as $song){
            foreach ($categoryList->getCategoryList() as $category){
                if ($song["category"] == $category["categoryId"]){
                    $result .= ' | ' . $category["category"];
                    break;
                }
            }
        }
        return $result;
    }

    /////////////////////////////

    public function renderSingerAlbumList($singerIndex){ // to render albums of a singer
        $albumData = $this->getAlbumList($singerIndex);
        for ($i = 0; $i<count($albumData); $i++){
            $singerLink = "./singer.php?singerIndex=" . $singerIndex;
            $albumDetailLink = "./productDetail.php?singerIndex=" . $singerIndex. "&" . "albumIndex=" . $i;
            echo
                '
                <div class="album__item">
                    <img class="album__img" src="'. $albumData[$i]["urlAvatar"] .'" alt="">
                    <div class="album__quickInfo">
                        <a href="'.$singerLink.'" class="album__singer">
                            '. $this->getSinger($singerIndex)["singerStageName"].'
                        </a>
                        <a href="'.$albumDetailLink.'" class="album__name">
                            '. $this->getAlbum($singerIndex, $i)["albumName"] .'
                        </a>
                        <div class="album__price">
                            <span>$'. $albumData[$i]["albumPrice"] .'</span>
                        </div>
                    </div>
                </div>
                ';
        }
    }

    public function renderAlbum(){ //to render all albums that in the data
        $currentMainData = $this->mainData;
        for ($i = 0; $i<count($currentMainData); $i++){
            $this->renderSingerAlbumList($i);
        }
    }

    public function renderSongList($songList){
        foreach ($songList as $song){
            echo $song["iframeSpotify"];
        }
    }

    public function addSong($singerIndex, $albumIndex, $song){
        $this->mainData[$singerIndex]["albumList"][$albumIndex]["songList"][] = $song->castToArray();
        $this->putToJson($this->mainData);
    }

    public function addAlbum($singerIndex, Album $album){
        $this->mainData[$singerIndex]["albumList"][] = $album->castToArray();
        $this->putToJson($this->mainData);
    }

    public function putToJson($data){
        $json = json_encode($data, JSON_UNESCAPED_UNICODE);
        file_put_contents("../data/mainData.json", $json);
    }
}

