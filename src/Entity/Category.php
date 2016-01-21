<?php

namespace AmineBenHariz\TunisianetScraper\Entity;

/**
 * Class Category
 * @package AmineBenHariz\TunisianetScraper\Entity
 */
class Category
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $url;

    /**
     * Category constructor.
     * @param string $title
     * @param int $id
     * @param string $url
     */
    public function __construct($title, $id, $url)
    {
        $this->title = $title;
        $this->id = $id;
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}
