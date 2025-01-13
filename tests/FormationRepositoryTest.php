<?php

namespace App\Tests\Repository;

use App\Entity\Formation;
use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class FormationRepositoryTest extends KernelTestCase
{
    protected function recupRepository(): FormationRepository
    {
        self::bootKernel();
        $repository=self::getContainer()->get(FormationRepository::class);
        return $repository;
    }

    // Test de la méthode 'add'
    public function testAddFormation()
    {
        $repository = $this->recupRepository();
        $formation = new Formation();
        $formation->setTitle("testAdd")
                  ->setPublishedAt(new \DateTime("2025-01-01"));
        
        // Ajouter la formation à la base de données
        $repository->add($formation);

        // Vérifier si la formation a bien été ajoutée
        $savedFormation = $repository->find($formation->getId());

        // Assurer que la formation a bien été ajoutée
        $this->assertNotNull($savedFormation);
        $this->assertEquals("testAdd", $savedFormation->getTitle());
        $this->assertEquals(new \DateTime("2025-01-01"), $savedFormation->getPublishedAt());
}
    // Test de la méthode 'remove'
    public function testRemoveFormation(): void
    {
        $repository = $this->recupRepository();
        $formation = new Formation();
        $formation->setTitle("testRemove")
                  ->setPublishedAt(new \DateTime("2025-01-01"));
        $repository->add($formation);
        $nbFormations= $repository->count([]);
        $repository->remove($formation);
        $this->assertEquals($nbFormations - 1, $repository->count([]), "erreur lors de la suppression");
       
    }
    
    




    }