<?php

namespace App\Tests\Repository;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Description of CategorieRepositoryTest
 *
 * @author Andréas
 */
class CategorieRepositoryTest extends KernelTestCase{
    protected function recupRepository(): CategorieRepository
    {
        self::bootKernel();
        $repository=self::getContainer()->get(CategorieRepository::class);
        return $repository;
    }
    
    public function testAddCategorie()
    {
        $repository = $this->recupRepository();
        $categorie = new Categorie();
        $categorie->setName("testAdd");
        
        // Ajouter la playlist à la base de données
        $repository->add($categorie);

        // Vérifier si la formation a bien été ajoutée
        $savedCategorie = $repository->find($categorie->getId());

        // Assurer que la formation a bien été ajoutée
        $this->assertNotNull($savedCategorie);
        $this->assertEquals("testAdd", $savedCategorie->getName());
    }
    // Test de la méthode 'remove'
    public function testRemovePlaylist(): void
    {
        $repository = $this->recupRepository();
        $categorie = new Categorie();
        $categorie->setName("testRemove");
        $repository->add($categorie);
        $nbCategories= $repository->count([]);
        $repository->remove($categorie);
        $this->assertEquals($nbCategories - 1, $repository->count([]), "erreur lors de la suppression");
    }
}
