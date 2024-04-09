<?php

namespace App\Controller;

use App\Repository\BoxRepository;
use App\Entity\Box;
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
}