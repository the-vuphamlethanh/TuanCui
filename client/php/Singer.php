<?php
namespace php;
class Singer
{
    private string $singerId;  //get only
    private string $singerName;
    private string $singerStageName;
    private string $gender;
    private string $singerDes;
    private string $urlAvatar;
    private array $albumList; // get only

    /**
     * @param string $nameSinger
     * @param string $stageNameSinger
     * @param string $gender
     * @param string $singerDes
     * @param string $urlAvatar
     * @param array $albumList
     */
    public function __construct(string $nameSinger, string $stageNameSinger, string $gender, string $singerDes, string $urlAvatar, array $albumList = [])
    {
        $this->singerId = date("m-d-h-i-s-a");
        $this->singerName = $nameSinger;
        $this->singerStageName = $stageNameSinger;
        $this->gender = $gender;
        $this->singerDes = $singerDes;
        $this->urlAvatar = $urlAvatar;
        $this->albumList = $albumList;
    }

    function castToArray(): array
    {
        return [
            "singerId" => $this->singerId,
            "singerName" => $this->singerName,
            "singerStageName" => $this->singerStageName,
            "gender" => $this->gender,
            "singerDes" => $this->singerDes,
            "urlAvatar" => $this->urlAvatar,
            "albumList" => $this->albumList
        ];
    }

    /**
     * @return string
     */
    public function getSingerId(): string
    {
        return $this->singerId;
    }

    /**
     * @return string
     */
    public function getSingerName(): string
    {
        return $this->singerName;
    }

    /**
     * @param string $singerName
     */
    public function setSingerName(string $singerName): void
    {
        $this->singerName = $singerName;
    }

    /**
     * @return string
     */
    public function getSingerStageName(): string
    {
        return $this->singerStageName;
    }

    /**
     * @param string $singerStageName
     */
    public function setSingerStageName(string $singerStageName): void
    {
        $this->singerStageName = $singerStageName;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getSingerDes(): string
    {
        return $this->singerDes;
    }

    /**
     * @param string $singerDes
     */
    public function setSingerDes(string $singerDes): void
    {
        $this->singerDes = $singerDes;
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
     * @return array
     */
    public function getAlbumList(): array
    {
        return $this->albumList;
    }
}