<?php

namespace App\Controller;

use App\Repository\LivreRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LivreController extends AbstractController
{
    //la methide index recoit une injection de dépendance qui correspond à la repository des livres puisque cette méthode est censée lister tous les livres 
    #[Route('/livre', name: 'livre')]
    public function index(LivreRepository $livreRepository, PaginatorInterface $paginator, Request $request): Response
    {
        //La methode render attend 2 parametres, la vue à renvoyer et dans tableau associatif
        //la ou les variables utilisables par le twig et leur valeurs
        $livres = $livreRepository->findAll();
        $pagination = $paginator->paginate(
            $livres, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            4/*limit per page*/
        );
        return $this->render('livre/index.html.twig', [
            'livres' => $pagination, 
        ]);
    }

    
    #[Route("/livre/search", name:'search-livre', methods:['GET'])]
    public function search(LivreRepository $livreRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $value = $request->query->get("search-value"); //On cherche dans al requete (barre d'adresse une variable nommé search-value issue d'un name d'input de formulaire)
        //dd($value); //dd= dump and die (debug command(pour voir se qu'on recup))

        //recherche sans pagination
        //$livres = $livreRepository->search($value);
        //return $this->render('livre/search.html.twig', ["livres"=>$livres]);

        //recherche avec pagination
        $livres = $livreRepository->searchForPaginator($value);
        $pagination = $paginator->paginate(
            $livres, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            2/*limit per page*/
        );
        return $this->render('livre/index.html.twig', ["livres"=>$pagination]);
        //return new Response("coucou");
    }

    //la route déclarée est une route contenanrt une partie dynamique (slug) d'ou l'utilisation des {} dans la déclaration.
    //il faut penser à donner un nom à la route. pour connaitre les routes déjà existantes
    //on peut faire appel à php bin/console debug:router
    #[Route('/livre/{slug}', name: 'livre-detail')]
    public function detail(LivreRepository $livreRepository, int $slug) : Response
    {
        return $this->render('livre/detail.html.twig', [
            'livre' => $livreRepository->find($slug),
        ]);
    } 
    //ATTETION A L'ORDRE DES CHEMINS LIGNE 41 EST DYNAMIQUE DOIT ETRE MIS A LA FIN
}