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
        $product = $scraper->getProductById(15800);

        $this->assertSame(true, $product->isAvailable());
        $this->assertSame('HUA722020ALA331', $product->getReference());
        $this->assertSame('Disque Dur Interne 3.5" Hitachi UltraStar 2 To', $product->getTitle());
        $this->assertStringStartsWith('Disque Dur Interne 3.5" Hitachi UltraStar - Inter', $product->getDescription());
        $this->assertSame(131.000, $product->getPrice());
        $this->assertSame(
            'http://www.tunisianet.com.tn/disques-durs-internes/15800-disque-dur-interne-35-hitachi-ultrastar-2-to.html',
            $product->getUrl()
        );
    }

    public function testGetCategoryById()
    {
        $scraper = new Scraper();
        $category = $scraper->getCategoryById(458);

        $this->assertSame('http://www.tunisianet.com.tn/458-disques-durs-internes', $category->getUrl());
        $this->assertSame('Disques Durs Internes Neufs', $category->getTitle());
        $this->assertSame(458, $category->getId());
        $this->assertCount(15, $category->getProducts());

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
