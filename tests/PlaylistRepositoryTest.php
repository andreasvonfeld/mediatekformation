<?php


namespace App\Tests\Repository;

use App\Entity\Playlist;
use App\Repository\PlaylistRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Description of PlaylistRepositoryTest
 *
 * @author Andréas
 */
class PlaylistRepositoryTest extends KernelTestCase {
    protected function recupRepository(): PlaylistRepository
    {
        self::bootKernel();
        $repository=self::getContainer()->get(PlaylistRepository::class);
        return $repository;
    }
    
    public function testAddPlaylist()
    {
        $repository = $this->recupRepository();
        $playlist = new Playlist();
        $playlist->setName("testAdd")
                  ->setDescription("Ceci est un test.");
        
        // Ajouter la playlist à la base de données
        $repository->add($playlist);

        // Vérifier si la formation a bien été ajoutée
        $savedPlaylist = $repository->find($playlist->getId());

        // Assurer que la formation a bien été ajoutée
        $this->assertNotNull($savedPlaylist);
        $this->assertEquals("testAdd", $savedPlaylist->getName());
        $this->assertEquals("Ceci est un test.", $savedPlaylist->getDescription());
    }
    // Test de la méthode 'remove'
    public function testRemovePlaylist(): void
    {
        $repository = $this->recupRepository();
        $playlist = new Playlist();
        $playlist->setName("testRemove")
                 ->setDescription("Ceci est un test.");
        $repository->add($playlist);
        $nbPlaylists= $repository->count([]);
        $repository->remove($playlist);
        $this->assertEquals($nbPlaylists - 1, $repository->count([]), "erreur lors de la suppression");
    }

}


