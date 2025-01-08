<?php

namespace App\Controller\admin;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\FormationRepository;
use App\Form\FormationType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Formation;
use Doctrine\Common\Collections\ArrayCollection;




/**
 * Description of AdminFormationController
 *
 * @author Andréas
 */
class AdminFormationsController  extends AbstractController
{
    // Déclaration des constantes au niveau de la classe
    private const FORMATIONS = 'formations';
    private const CATEGORIES = 'categories';
    
    /**
     * @var FormationRepository
     */
    private $formationRepository;

    /**
     * @var CategorieRepository
     */
    private $categorieRepository;

    public function __construct(FormationRepository $formationRepository, CategorieRepository $categorieRepository)
    {
        $this->formationRepository = $formationRepository;
        $this->categorieRepository = $categorieRepository;
    }
    

    
    #[Route('/admin.formations', name: 'admin.formations')]
public function index(): Response
{
    $formations = $this->formationRepository->findAll();
    $categories = $this->categorieRepository->findAll();

    return $this->render("admin/admin.formations.html.twig", [
        self::FORMATIONS => $formations,
        self::CATEGORIES => $categories,
    ]);
}


#[Route('/admin.formations/update/{id}', name: 'formations.update', methods: ['POST'])]
public function update($id, Request $request): Response {
    $formation = $this->formationRepository->find($id);

    if (!$formation) {
        throw $this->createNotFoundException('Formation non trouvée');
    }

    $formation->setTitle($request->request->get('title'));
    $formation->setDescription($request->request->get('description'));
    $formation->setPublishedAt(new \DateTime($request->request->get('publishedAt')));

    // Gestion des catégories
    $categoriesIds = $request->request->all('categories') ?? [];
if (!is_array($categoriesIds)) {
    $categoriesIds = [];
}

$categories = $this->categorieRepository->findBy(['id' => $categoriesIds]);

// Mettre à jour les catégories
$formation->setCategories(new ArrayCollection($categories));

    $this->formationRepository->save($formation, true);

    return $this->redirectToRoute('formations');
}

#[Route('/admin.formations/edit/{id}', name: 'formations.edit')]
public function edit(int $id, Request $request): Response {
    $formation = $this->formationRepository->find($id);
    $categories = $this->categorieRepository->findAll();
    $formFormation = $this->createForm(FormationType::class, $formation);
    
    $formFormation->handleRequest($request);
    if ($formFormation->isSubmitted()&& $formFormation->isValid()){
        $this->formationRepository->add($formation);
        return $this->redirectToRoute('admin.formations');
    }

    return $this->render("admin/admin.formations.edit.html.twig", [
        'formation' => $formation,
        'categories' => $categories,
         'formformation' => $formFormation->createView()
    ]);
}

//supprimer une formation

#[Route('/admin.formations/delete/{id}', name: 'formations.delete')]
public function suppr(int $id): Response {
    $formation = $this->formationRepository->find($id);
    $this->formationRepository->remove($formation);
    return $this->redirectToRoute('admin.formations');
}

#[Route('/admin.formations/new', name: 'formations.new')]
public function create(Request $request): Response {
    $formation = new Formation();
    $formformation = $this->createForm(FormationType::class, $formation);

    $formformation->handleRequest($request);
    if ($formformation->isSubmitted() && $formformation->isValid()) {
        $this->formationRepository->add($formation);
        return $this->redirectToRoute('admin.formations');
    }

    return $this->render("admin/admin.formations.create.html.twig", [
        'formation' => $formation,
        'formformation' => $formformation->createView() // Assurez-vous que formformation est bien passé
    ]);
}

//tries

#[Route('admin/admin.formations/tri/{champ}/{ordre}/{table}', name: 'admin.formations.sort')]
    public function sort($champ, $ordre, $table=""): Response{
        $formations = $this->formationRepository->findAllOrderBy($champ, $ordre, $table);
        $categories = $this->categorieRepository->findAll();
        return $this->render("admin/admin.formations.html.twig", [
            'formations' => $formations,
            'categories' => $categories
        ]);
    }     

    #[Route('admin/admin.formations/recherche/{champ}/{table}', name: 'admin.formations.findallcontain')]
    public function findAllContain($champ, Request $request, $table=""): Response{
        $valeur = $request->get("recherche");
        $formations = $this->formationRepository->findByContainValue($champ, $valeur, $table);
        $categories = $this->categorieRepository->findAll();
        return $this->render("admin/admin.formations.html.twig", [
            'formations' => $formations,
            'categories' => $categories,
            'valeur' => $valeur,
            'table' => $table
        ]);
    }  


}
