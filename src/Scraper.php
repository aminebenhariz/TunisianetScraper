<?php

namespace AmineBenHariz\TunisianetScraper;

use AmineBenHariz\TunisianetScraper\Entity\Category;
use AmineBenHariz\TunisianetScraper\Entity\Product;
use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

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

        $product = new Product($productId, $title, $reference, $description, $price, $available, $url);

        return $product;
    }

    /**
     * @param int $categoryId
     * @return Category
     */
    public function getCategoryById($categoryId)
    {
        $url = 'http://www.tunisianet.com.tn/'.$categoryId.'-';
        $crawler = $this->client->request('GET', $url);

        $url = $this->client->getHistory()->current()->getUri();

        $title = $crawler->filter('title')->text();


        $products = $crawler->filter('#produit_liste_main .ajax_block_product')->each(function ($node) {
            $title = $node->filter('.center_block > h2 > a')->text();
            $id = intval($node->filter("input[id^='hit_id']")->attr('value'));
            $reference = $node->filter("input[id^='hit_ref']")->attr('value');
            $description = $node->filter('.center_block > .product_desc > a')->text();
            $priceTag = $node->filter('.price')->text();
            $price =  floatval(str_replace(',', '.', $priceTag));
            $available = $node->filter('#produit_liste_prix > div:nth-child(2)')->attr('class') === 'en_stock';
            $url = $node->filter('.center_block > h2 > a')->attr('href');

            $product = new Product($id, $title, $reference, $description, $price, $available, $url);

            return $product;
        });

        $category = new Category($categoryId, $title, $url, $products);
        return $category;
    }
}
