<?php

namespace App\Controller;

use App\Repository\AuteurRepository;

use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AuteurController extends AbstractController
{
    #[Route('/auteur', name: 'auteur')]
    public function index(AuteurRepository $auteurRepository, PaginatorInterface $paginator, Request $request): Response
    {
        //Comme on veut paginer la liste on ne peut passer au twig la requète findAll() directement
        // On fait en premier la requête pour récupérer les données
        $auteurs = $auteurRepository->findAll();
        //on fait appel au paginator (injection de dépendance dans la déclaration de la méthode) pour paginer (diviser) le nombre d'entrées retournées par la requete suivant le nombre à afficher par page
        $pagination = $paginator->paginate(
            $auteurs, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            2 /*limit per page (une 15 ene par page c'est bien)*/
        );
        //
        return $this->render('auteur/index.html.twig', [
            //'auteurs' => $auteurRepository->findAll(),
            'auteurs' => $pagination,
        ]);
    }

    #[Route('/auteur-detail/{id}', name: 'auteur-detail')]
    public function detail(AuteurRepository $auteurRepository, int $id) : Response
    {
        return $this->render('auteur/detail.html.twig', [
            'auteur' => $auteurRepository->find($id),
        ]);
    } 
}
