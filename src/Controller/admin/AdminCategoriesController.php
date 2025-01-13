<?php

namespace App\Controller\admin;

use App\Repository\CategorieRepository;
use App\Repository\PlaylistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FormationRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Categorie;
use App\Form\CategorieType;

/**
 * Description of AdminPlaylistsController
 *
 * @author Andréas
 */
class AdminCategoriesController extends AbstractController{

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
    
    /**
     * Chargement de la page
     * @param Request $request
     * @return Response
     */
    #[Route('/admin.categories', name: 'admin.categories')]
public function index(Request $request): Response
{
    // Vérifier la connexion
    $this->denyAccessUnlessGranted('ROLE_USER');
    
    // Récupérer la liste pour affichage
    $categories = $this->categorieRepository->findAll();

    // Créer l'objet Categorie
    $categorie = new Categorie();

    // Construire le formulaire CategorieType
    $form = $this->createForm(CategorieType::class, $categorie);

    // Gérer la requête (soumission du formulaire)
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        // Enregistrer la catégorie si le formulaire est valide
        $this->categorieRepository->add($categorie);

        // Redirection
        return $this->redirectToRoute('admin.categories');
    }

    // Rendre le template en passant la variable 'formCategorie'
    return $this->render("admin/admin.categories.html.twig", [
        'categories'    => $categories,
        'formCategorie' => $form->createView(),
    ]);
}
/**
 * Méthode de suppression
 * @param int $id
 * @return Response
 */
#[Route('/admin.categories/delete/{id}', name: 'categories.delete')]
public function suppr(int $id): Response {
    $this->denyAccessUnlessGranted('ROLE_USER');
    $categorie = $this->categorieRepository->find($id);
    $this->categorieRepository->remove($categorie);
    return $this->redirectToRoute('admin.categories');
}

}
