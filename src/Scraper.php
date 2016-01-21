<?php

namespace AmineBenHariz\TunisianetScraper;

use Goutte\Client;

/**
 * Class Scraper
 * @package AmineBenHariz\TunisianetScraper
 */
class Scraper
{
    /**
     * @var Client
     */
    private $client;

    /**
     * Scraper constructor.
     */
    public function __construct()
    {
        $this->client = new Client();
    }

    /**
     * @param int $productId
     */
    public function getProductById($productId)
    {

    }
}
