<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }

     public function testSuccess()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/success');

        $this->assertEquals(1, $crawler->filter('h1:contains("Voiture ajouté avec succès")')->count());
        $this->assertTrue($crawler->filter('p')->count() > 0); // tester s'il y'a des paragraphes(tags 'p' dans la page success.html)

    }
}
