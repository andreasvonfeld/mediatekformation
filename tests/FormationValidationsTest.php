<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace App\Tests\Validations;

use App\Entity\Formation;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class FormationValidationsTest extends KernelTestCase
{
    public function testSetPublishedAt()
{
    // Créer une instance de la formation
        $formation = new Formation();
        $formation->setTitle("test");

        // Test avec une date future : la méthode devrait lever une exception
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("La date ne peut pas être postérieure à aujourd'hui.");

        $futureDate = new \DateTime("tomorrow"); // Une date dans le futur
        $formation->setPublishedAt($futureDate);
}
}
