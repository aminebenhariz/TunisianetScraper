<?php

namespace AmineBenHariz\TunisianetScraper\Tests;

use AmineBenHariz\TunisianetScraper\Scraper;

/**
 * Class ScraperTest
 * @package AmineBenHariz\TunisianetScraper\Tests
 */
class ScraperTest extends \PHPUnit_Framework_TestCase
{

    public function testGetProductById()
    {
        $scraper = new Scraper();
        $product = $scraper->getProductById(17243);

        $this->assertSame(true, $product->isAvailable(), 'product not available');
        $this->assertSame('CARBIDE-400C', $product->getReference(), 'invalid reference');
        $this->assertSame('Boitier Corsair Carbide 400C', $product->getTitle(), 'invalid title');
        $this->assertStringStartsWith(
            'Boîtier Moyen Tour en acier avec fenêtre',
            $product->getDescription(),
            'invalid description'
        );
        $this->assertSame(265.000, $product->getPrice(), 'invalid price');
        $this->assertSame(
            'http://www.tunisianet.com.tn/boitier-pour-pc-de-bureau/17243-boitier-corsair-carbide-400c.html',
            $product->getUrl(),
            'invalid url'
        );
    }

    public function testGetCategoryById()
    {
        $scraper = new Scraper();
        $category = $scraper->getCategoryById(435);

        $this->assertSame(
            'http://www.tunisianet.com.tn/435-carte-raid-pour-serveur',
            $category->getUrl(),
            'invalid url'
        );

        $this->assertSame('Carte Raid pour Serveur', $category->getTitle(), 'invalid title');
        $this->assertSame(435, $category->getId(), 'invalid id');
        $this->assertCount(2, $category->getProducts(), 'invalid product count');

        $product = $category->getProducts()[0];

        $expectedProduct = $scraper->getProductById($product->getId());

        $this->assertSame($expectedProduct->getId(), $product->getId());
        $this->assertSame($expectedProduct->getTitle(), $product->getTitle());
        $this->assertSame($expectedProduct->getReference(), $product->getReference());
        $this->assertSame($expectedProduct->getDescription(), $product->getDescription());
        $this->assertSame($expectedProduct->getPrice(), $product->getPrice());
        $this->assertSame($expectedProduct->getUrl(), $product->getUrl());
        $this->assertSame($expectedProduct->isAvailable(), $product->isAvailable());
    }
}
