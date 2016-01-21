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
    }
}
