<?php

namespace AmineBenHariz\TunisianetScraper\Entity;

/**
 * Class Category
 * @package AmineBenHariz\TunisianetScraper\Entity
 */
class Category
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $url;

    /**
     * @var Product[]
     */
    private $products;

    /**
     * Category constructor.
     * @param int $id
     * @param string $title
     * @param string $url
     * @param Product[] $products
     */
    public function __construct($id, $title, $url, $products)
    {
        $this->id = $id;
        $this->title = $title;
        $this->url = $url;
        $this->products = $products;
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

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }
}
