<?php

namespace php;

class CategoryList
{
    private array $categoryList;

    public function __construct()
    {
        $this->categoryList = json_decode(file_get_contents('../data/cates.json'), true);
//        print_r($this->categoryList);
    }

    /**
     * @return array|mixed
     */
    public function getCategoryList(): mixed
    {
        return $this->categoryList;
    }
}