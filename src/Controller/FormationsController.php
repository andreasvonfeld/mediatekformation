<?php
namespace App\Controller;
use App\Entity\Formation;


use App\Repository\CategorieRepository;
use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Controleur des formations
 *
 * @author emds
 */
class FormationsController extends AbstractController {

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
    
    /**
     * Chargement de la page
     * @return Response
     */
    #[Route('/formations', name: 'formations')]
public function index(): Response
{
    $formations = $this->formationRepository->findAll();
    $categories = $this->categorieRepository->findAll();

    return $this->render("pages/formations.html.twig", [
        self::FORMATIONS => $formations,
        self::CATEGORIES => $categories,
    ]);
}
    /**
     * Méthode de tri
     * @param type $champ
     * @param type $ordre
     * @param type $table
     * @return Response
     */
    #[Route('/formations/tri/{champ}/{ordre}/{table}', name: 'formations.sort')]
    public function sort($champ, $ordre, $table=""): Response{
        $formations = $this->formationRepository->findAllOrderBy($champ, $ordre, $table);
        $categories = $this->categorieRepository->findAll();
        return $this->render("pages/formations.html.twig", [
            'formations' => $formations,
            'categories' => $categories
        ]);
    }     

    /**
     * Méthode de recherche
     * @param type $champ
     * @param Request $request
     * @param type $table
     * @return Response
     */
    #[Route('/formations/recherche/{champ}/{table}', name: 'formations.findallcontain')]
    public function findAllContain($champ, Request $request, $table=""): Response{
        $valeur = $request->get("recherche");
        $formations = $this->formationRepository->findByContainValue($champ, $valeur, $table);
        $categories = $this->categorieRepository->findAll();
        return $this->render("pages/formations.html.twig", [
            'formations' => $formations,
            'categories' => $categories,
            'valeur' => $valeur,
            'table' => $table
        ]);
    }  

    /**
     * Méthode qui affiche les détails d'une formation
     * @param type $id
     * @return Response
     */
    #[Route('/formations/formation/{id}', name: 'formations.showone')]
    public function showOne($id): Response{
        $formation = $this->formationRepository->find($id);
        return $this->render("pages/formation.html.twig", [
            'formation' => $formation
        ]);        
    }   
    
    


}
    

