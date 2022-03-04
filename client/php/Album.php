<?php
namespace php;
use JetBrains\PhpStorm\ArrayShape;

class Album
{
    private string $albumId;
    private string $albumName;
    private string $urlAvatar;
    private string $albumDes;
    private float $albumPrice;
    private array $songList;

    /**
     * @param string $albumName
     * @param string $urlAvatar
     * @param string $albumDes
     * @param float $albumPrice
     * @param array $songList
     */
    public function __construct(string $albumName, string $urlAvatar, string $albumDes, float $albumPrice, array $songList = [])
    {
        $this->albumId = date("m-d-h-i-s-a");
        $this->albumName = $albumName;
        $this->urlAvatar = $urlAvatar;
        $this->albumDes = $albumDes;
        $this->albumPrice = $albumPrice;
        $this->songList = $songList;
    }

    #[ArrayShape(["albumId" => "string", "albumName" => "string", "urlAvatar" => "string", "albumDes" => "string", "albumPrice" => "float", "songList" => "array"])]
    function castToArray(): array
    {
        return [
            "albumId" => $this->albumId,
            "albumName" => $this->albumName,
            "urlAvatar" => $this->urlAvatar,
            "albumDes" => $this->albumDes,
            "albumPrice" => $this->albumPrice,
            "songList" => $this->songList
        ];
    }

    /**
     * @return false|string
     */
    public function getAlbumId(): string
    {
        return $this->albumId;
    }

    /**
     * @return string
     */
    public function getAlbumName(): string
    {
        return $this->albumName;
    }

    /**
     * @param string $albumName
     */
    public function setAlbumName(string $albumName): void
    {
        $this->albumName = $albumName;
    }

    /**
     * @return string
     */
    public function getUrlAvatar(): string
    {
        return $this->urlAvatar;
    }

    /**
     * @param string $urlAvatar
     */
    public function setUrlAvatar(string $urlAvatar): void
    {
        $this->urlAvatar = $urlAvatar;
    }

    /**
     * @return string
     */
    public function getAlbumDes(): string
    {
        return $this->albumDes;
    }

    /**
     * @param string $albumDes
     */
    public function setAlbumDes(string $albumDes): void
    {
        $this->albumDes = $albumDes;
    }

    /**
     * @return float
     */
    public function getAlbumPrice(): float
    {
        return $this->albumPrice;
    }

    /**
     * @param float $albumPrice
     */
    public function setAlbumPrice(float $albumPrice): void
    {
        $this->albumPrice = $albumPrice;
    }

    /**
     * @return array
     */
    public function getSongList(): array
    {
        return $this->songList;
    }
}