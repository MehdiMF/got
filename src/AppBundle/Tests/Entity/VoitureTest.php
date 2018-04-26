<?php

namespace AppBundleBundle\Tests\Entity;
use AppBundle\Entity\Voiture;

class VoitureTest extends \PHPUnit_Framework_TestCase
{

 public function testHello()
    {
        $voiture = new Voiture();

        $this->assertEquals('mehdi', $voiture->hello('mehdi'));
        $this->assertEquals('yassine', $voiture->hello('yassine'));
    }

    public function testSetMarque()
    {
    $voiture = new Voiture();

    $voiture->setMarque('BMW');
    $this->assertEquals('BMW', $voiture->getMarque());
    }

}

