<?php

namespace AmineBenHariz\TunisianetScraper\Entity;

/**
 * Class Product
 * @package AmineBenHariz\TunisianetScraper\Entity
 */
class Product
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $reference;

    /**
     * @var string
     */
    private $description;

    /**
     * @var float
     */
    private $price;

    /**
     * @var bool
     */
    private $available;

    /**
     * Product constructor.
     * @param string $title
     * @param string $reference
     * @param string $description
     * @param float $price
     * @param bool $available
     */
    public function __construct($title, $reference, $description, $price, $available)
    {
        $this->title = $title;
        $this->reference = $reference;
        $this->description = $description;
        $this->price = $price;
        $this->available = $available;
    }


    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return boolean
     */
    public function isAvailable()
    {
        return $this->available;
    }


}
