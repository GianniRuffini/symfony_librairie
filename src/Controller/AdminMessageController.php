<?php

namespace App\Controller;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminMessageController extends AbstractController
{
    #[Route('/admin/message', name: 'admin_message')]
    public function index(ContactRepository $contactRepository): Response
    {
        return $this->render('admin_message/index.html.twig', [
            'messages' => $contactRepository->findAll(),
        ]);
    }

    #[Route('/admin/message/delete/{id}', name:'delete-message')]
    public function deleteMessage(int $id, ContactRepository $contactRepository):Response
    {
        //on recupere un entity manager
        $em = $this->getDoctrine()->getManager();
        //on recupere le contact et on met a jour la bdd
        $contact = $contactRepository->find($id);
        $em->remove($contact);
        $em->flush();
        //on redirige
        return $this->redirectToRoute("admin_message");
    }
}
