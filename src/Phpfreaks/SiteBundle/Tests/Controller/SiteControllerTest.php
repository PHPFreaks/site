<?php

namespace Phpfreaks\SiteBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SiteControllerTest extends WebTestCase
{
    public function testIndex()
    {
        // Verify we can grab the homepage
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertTrue($crawler->filter('html:contains("Homepage!")')->count() > 0);
    }

    public function testPage()
    {
        // Verify we can grab a static page
        $client = static::createClient();
        $client->request('GET', '/page/about');
        $this->assertTrue($crawler->filter('html:contains("About PHPFreaks!")')->count() > 0);

        // Verify 404's
        $client = static::createClient();
        $client->request('GET', '/page/foobar');
        $this->assertTrue($client->getResponse()->isNotFound());
    }

}
