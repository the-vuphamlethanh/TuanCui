<?php
namespace php;
class Song
{
    private string $songId;
    private string $songName;
    private string $urlAvatar;
    private string $iframeSpotify;
    private string $category;
    private string $lyric;

    /**
     * @param string $songName
     * @param string $urlAvatar
     * @param string $iframeSpotify
     * @param string $category
     * @param string $lyric
     */
    public function __construct(string $songName, string $urlAvatar, string $iframeSpotify, string $category, string $lyric)
    {
        $this->songId = date("m-d-h-i-s-a");
        $this->songName = $songName;
        $this->urlAvatar = $urlAvatar;
        $this->iframeSpotify = $iframeSpotify;
        $this->category = $category;
        $this->lyric = $lyric;
    }

    function castToArray(): array
    {
        return [
            "songId" => $this->songId,
            "songName" => $this->songName,
            "urlAvatar" => $this->urlAvatar,
            "iframeSpotify" => $this->iframeSpotify,
            "category" => $this->category,
            "lyric" => $this->lyric
        ];
    }

    /**
     * @return false|string
     */
    public function getSongId()
    {
        return $this->songId;
    }

    /**
     * @return string
     */
    public function getSongName(): string
    {
        return $this->songName;
    }

    /**
     * @param string $songName
     */
    public function setSongName(string $songName): void
    {
        $this->songName = $songName;
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
    public function getIframeSpotify(): string
    {
        return $this->iframeSpotify;
    }

    /**
     * @param string $iframeSpotify
     */
    public function setIframeSpotify(string $iframeSpotify): void
    {
        $this->iframeSpotify = $iframeSpotify;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getLyric(): string
    {
        return $this->lyric;
    }

    /**
     * @param string $lyric
     */
    public function setLyric(string $lyric): void
    {
        $this->lyric = $lyric;
    }
}