<?php

namespace App\Controller;

use App\Form\UserProfileType;
use App\Repository\LivreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'profile')]
    public function index(Request $request, UserPasswordHasherInterface $uphi): Response
    {
        //Mise en place du formulaire permettant la modification des informationd de l'utilisateurs dans la vue de profile
        //1 on recupère l'utilisateur connecté
        $user = $this->getUser();
        //dd(user);
        //2 on instancie un objet (pas le rendu) de formulaire d'aprés un modèle de 
        //formulaire et on l'associe à l'utilisateur, du coup le formulaire 
        //est associé aux données de l'utilisateur
        $profileForm = $this->createForm(UserProfileType::class, $user);
        //on verifie la possibilité d'hydrater (de remplir) le formulaire avec les données se trouvant dans la requete
        $profileForm->handleRequest($request);
        //si on a pus hydrater le formulaire on verifie si il est envoyer et surtout valide
        if($profileForm->isSubmitted() && $profileForm->isValid()){
            $plainPassword =$profileForm->getData()->getPlainPassword();
            // dd($plainPassword);
            if(!is_null($plainPassword)){
                $encodedPassword = $uphi->hashPassword($user, $plainPassword);
                $user->setPassword($encodedPassword);
                $this->addFlash('warning', "Votre mot de passe à bien été changé.");
            }
            //on récupère un entity manager pour pouvoir gérer la mise en base de données
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            //On met en place un flashMessage
            $this->addFlash('success', "Vos information ont bien été mis a jour.");
            // On redirige sur la route profile (oui c'est la meme page) ce qui permet de symfony de supprimer les message losqu'il on ete afficher pas le twig, sinon il reste en memoire
            //ainsi que les information du formulaire de l'utilisateur se trouvant dans la request de sorte que si on recharge la page, les modif sont continuellement refaite et les alerte affich
            return $this->redirectToRoute("profile");
        }

        return $this->render('profile/index.html.twig', [
            "form"=>$profileForm->createView(),//on passe a la vue le rendu du formulaire
        ]);
    }

    #[Route('/profile/addfavori')]
    public function addFavori(Request $request, LivreRepository $livreRepository):Response
    {
        //on récupère l'id du livre envoyer par ajax 
        $livreId = $request->request->get("id");
        //on récupère le livre 
        $livre = $livreRepository->find($livreId);
        //on récupère le user connéter
        $user = $this->getUser();
        //on ajoute le livre dans la liste de l'utilisateur
        $user->addBookList($livre);
        //on récupere un entity manager pour faire un persist et un flux
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        //on retourne une reponse
        return new Response("ok");
    }

    #[Route('/profile/removefavori/{id}', name:'deleteLivreListe')]
    public function removeFavori(int $id, LivreRepository $livreRepository):Response
    {
        //on récupère le livre 
        $livre = $livreRepository->find($id);
        //on récupère le user connéter
        $user = $this->getUser();
        //on ajoute le livre dans la liste de l'utilisateur
        $user->removeBookList($livre);
        //on récupere un entity manager pour faire un persist et un flux
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();
        //redirection
        return $this->redirectToRoute("profile");
    }
}
