<?php

namespace App\Controller\admin;

use App\Repository\CategorieRepository;
use App\Repository\FormationRepository;
use App\Repository\PlaylistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Playlist;
use App\Form\PlaylistType;

/**
 * Description of AdminPlaylistsController
 *
 * @author Andréas
 */
class AdminPlaylistsController extends AbstractController{

    // Définition des constantes pour éviter la duplication
    private const ROUTE_PLAYLISTS = 'playlists';
    private const TEMPLATE_PLAYLISTS = 'pages/playlists.html.twig';
    private const TEMPLATE_PLAYLIST = 'pages/playlist.html.twig';
    private const KEY_PLAYLISTS = 'playlists';
    private const KEY_CATEGORIES = 'categories';
    private const KEY_VALEUR = 'valeur';
    private const KEY_TABLE = 'table';

    private PlaylistRepository $playlistRepository;
    private CategorieRepository $categorieRepository;
    private FormationRepository $formationRepository;

    public function __construct(
        PlaylistRepository $playlistRepository,
        CategorieRepository $categorieRepository,
        FormationRepository $formationRepository
    ) {
        $this->playlistRepository = $playlistRepository;
        $this->categorieRepository = $categorieRepository;
        $this->formationRepository = $formationRepository;
    }
    
    #[Route('/admin.playlists', name: 'admin.playlists')]
public function index(): Response
{
    $playlists = $this->playlistRepository->findAll();
    $categories = $this->categorieRepository->findAll();

    return $this->render("admin/admin.playlists.html.twig", [
        'playlists' => $playlists,
            'categories' => $categories
    ]);
}
#[Route('/admin.playlists/delete/{id}', name: 'playlists.delete')]
public function suppr(int $id): Response {
    $playlist = $this->playlistRepository->find($id);
    
    // Vérifie si la playlist contient des formations
    if ($playlist->getFormations()->count() > 0) {
        // Il y a au moins une formation liée à cette playlist
        $this->addFlash('error', 'Impossible de supprimer : la playlist contient des formations.');
        return $this->redirectToRoute('admin.playlists');
    }
    
    $this->playlistRepository->remove($playlist);
    return $this->redirectToRoute('admin.playlists');
}
#[Route('/admin.playlists/new', name: 'playlists.new')]
public function create(Request $request): Response {
    $playlist = new Playlist();
    $formplaylist = $this->createForm(PlaylistType::class, $playlist);

    $formplaylist->handleRequest($request);
    if ($formplaylist->isSubmitted() && $formplaylist->isValid()) {
        $this->playlistRepository->add($playlist);
        return $this->redirectToRoute('admin.playlists');
    }

    return $this->render("admin/admin.playlists.create.html.twig", [
        'playlist' => $playlist,
        'formplaylist' => $formplaylist->createView() // Assurez-vous que formformation est bien passé
    ]);
}

#[Route('/admin.playlists/edit/{id}', name: 'playlists.edit')]
public function edit(int $id, Request $request): Response {
    $playlist = $this->playlistRepository->find($id);
    $categories = $this->categorieRepository->findAll();
    $formPlaylist = $this->createForm(PlaylistType::class, $playlist);
    
    $formPlaylist->handleRequest($request);
    if ($formPlaylist->isSubmitted()&& $formPlaylist->isValid()){
        $this->playlistRepository->add($playlist);
        return $this->redirectToRoute('admin.playlists');
    }

    return $this->render("admin/admin.playlists.edit.html.twig", [
        'playlist' => $playlist,
        'categories' => $categories,
         'formplaylist' => $formPlaylist->createView()
    ]);
}

//tris


    #[Route('admin/admin.playlists/tri/{champ}/{ordre}', name: 'admin.playlists.sort')]
    public function sort($champ, $ordre): Response{
        switch($champ){
            case "name":
                $playlists = $this->playlistRepository->findAllOrderByName($ordre);
                break;
            default:
                $categories = $this->categorieRepository->findAll();
                break;
                
        }
        $categories = $this->categorieRepository->findAll();
        return $this->render("admin/admin.playlists.html.twig", [
            'playlists' => $playlists,
            'categories' => $categories            
        ]);
    }          

    #[Route('admin/admin.playlists/recherche/{champ}/{table}', name: 'admin.playlists.findallcontain')]
    public function findAllContain($champ, Request $request, $table=""): Response{
        $valeur = $request->get("recherche");
        $playlists = $this->playlistRepository->findByContainValue($champ, $valeur, $table);
        $categories = $this->categorieRepository->findAll();
        return $this->render("admin/admin.playlists.html.twig", [
            'playlists' => $playlists,
            'categories' => $categories,            
            'valeur' => $valeur,
            'table' => $table
        ]);
    }  

    #[Route('admin/admin.playlists/playlist/{id}', name: 'admin.playlists.showone')]
    public function showOne($id): Response{
        $playlist = $this->playlistRepository->find($id);
        $playlistCategories = $this->categorieRepository->findAllForOnePlaylist($id);
        $playlistFormations = $this->formationRepository->findAllForOnePlaylist($id);
        return $this->render("admin/admin.playlist.html.twig", [
            'playlist' => $playlist,
            'playlistcategories' => $playlistCategories,
            'playlistformations' => $playlistFormations
        ]);        
    }     
}
