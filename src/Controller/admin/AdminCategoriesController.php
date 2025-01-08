<?php

namespace App\Controller\admin;

use App\Repository\CategorieRepository;
use App\Repository\PlaylistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FormationRepository;
use App\Form\FormationType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Categorie;
use Doctrine\Common\Collections\ArrayCollection;
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
    
    #[Route('/admin.categories', name: 'admin.categories')]
public function index(Request $request): Response
{
        $this->denyAccessUnlessGranted('ROLE_USER');
    // 1. Récupérer la liste pour affichage
    $categories = $this->categorieRepository->findAll();

    // 2. Créer l'objet Categorie
    $categorie = new Categorie();

    // 3. Construire le formulaire CategorieType
    $form = $this->createForm(CategorieType::class, $categorie);

    // 4. Gérer la requête (soumission du formulaire)
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        // 5. Enregistrer la catégorie si le formulaire est valide
        $this->categorieRepository->add($categorie);

        // Optionnel : message flash
        $this->addFlash('success', 'Catégorie ajoutée avec succès.');

        // Redirection
        return $this->redirectToRoute('admin.categories');
    }

    // 6. Rendre le template en passant la variable 'formCategorie'
    return $this->render("admin/admin.categories.html.twig", [
        'categories'    => $categories,
        'formCategorie' => $form->createView(),  // <= IMPORTANT
    ]);
}
#[Route('/admin.categories/delete/{id}', name: 'categories.delete')]
public function suppr(int $id): Response {
    $this->denyAccessUnlessGranted('ROLE_USER');
    $categorie = $this->categorieRepository->find($id);
    $this->categorieRepository->remove($categorie);
    return $this->redirectToRoute('admin.categories');
}

}
