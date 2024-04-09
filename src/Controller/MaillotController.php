<?php

namespace App\Controller;

use App\Form\MaillotType;
use App\Repository\MaillotRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Maillot;

class MaillotController extends AbstractController
{
    #[Route('/maillot', name: 'app_maillot')]
    public function index(MaillotRepository $maillotRepository): Response
    {
        $maillots = $maillotRepository->findBy(array(), array('nom' => 'ASC'));
        return $this->render('maillot/maillot.html.twig', [
            'maillots' => $maillots,
        ]);
    }

    #[Route('/ajout-maillot', name: 'app_ajout_maillot')]
    public function ajoutMaillot(MaillotType $maillotType, EntityManagerInterface $em, Request $request): Response
    {
        $ajoutMaillot = new Maillot();
        $form = $this->createForm(MaillotType::class, $ajoutMaillot);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($ajoutMaillot);
                $em->flush();
                $this->addFlash('notice','Article ajouté');
                return $this->redirectToRoute('app_maillot');
            }
        }
        return $this->render('maillot/ajout-maillot.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
