<?php

namespace AmineBenHariz\TunisianetScraper;

use AmineBenHariz\TunisianetScraper\Entity\Product;
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
     * @return Product
     */
    public function getProductById($productId)
    {
        $url = 'http://www.tunisianet.com.tn/x/'.$productId.'-x.html';

        $crawler = $this->client->request('GET', $url);

        $url = $this->client->getHistory()->current()->getUri();

        $title = $crawler->filter('h1 > acronym')->text();
        $reference = $crawler->filter('#hit_ref')->attr('value');
        $priceTag = $crawler->filter('#our_price_display')->text();
        $price =  floatval(str_replace(',', '.', $priceTag));
        $description = $crawler->filter('#short_description_content')->text();
        $available = $crawler->filter('form#buy_block > div')->attr('class') === 'en_stock';

        $product = new Product($title, $reference, $description, $price, $available, $url);

        return $product;
    }
}
