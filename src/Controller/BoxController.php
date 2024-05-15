<?php

namespace App\Controller;

use App\Entity\Box;
use App\Form\BoxType;
use App\Repository\BoxRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BoxController extends AbstractController
{
    #[Route('/box', name: 'app_box')]
    public function box(BoxRepository $boxRepository): Response
    {
        $boxs = $boxRepository->findBy(array(),array('nom'=>'ASC'));
        return $this->render('box/box.html.twig', [
            'boxs' => $boxs
        ]);
    }

    #[Route('/ajout-box', name: 'app_ajout_box')]
    public function ajoutBox(BoxType $boxType, EntityManagerInterface $em, Request $request): Response
    {
        $ajoutBox = new Box();
        $form = $this->createForm(BoxType::class, $ajoutBox);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($ajoutBox);
                $em->flush();
                $this->addFlash('notice','Article ajouté');
                return $this->redirectToRoute('app_box');
            }
        }
        return $this->render('box/ajout-box.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/supprimer-article/{id}', name:'app_supprimer_article')]
    public function supprimerArticle(Request $request, Box $box, EntityManagerInterface $em): Response
    {
        if($box!=null){
            $em->remove($box);
            $em->flush();
            $this->addFlash('notice','box supprimé');
        }
        return $this->redirectToRoute('app_liste_futurs_articles');
    }
}
