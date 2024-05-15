<?php

namespace App\Controller;

use App\Entity\Box;
use App\Entity\Panier;
use App\Entity\Inserer;
use App\Entity\Maillot;
use App\Repository\BoxRepository;
use App\Repository\MaillotRepository;
use App\Repository\AssocierRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class PanierController extends AbstractController
{
    #[Route('/panier',name:'app_panier')]
    public function Panier(MaillotRepository $mr, BoxRepository $br, AssocierRepository $ar):Response
    {
        $maillot = $mr->findAll();
        $associer = $ar->findAll();
        $box = $br->findAll();
        $panier = $this->getUser()->getPanier()->getInserers();
        return $this->render('panier/panier.html.twig',[
            'panier' => $panier,
            'maillot' => $maillot,
            'associer'=>$associer,
            'box' => $box
        ]);
    }

    #[Route('/private-ajout-panier-maillot/{id}', name:'app_ajout_panier_maillot')]
    public function ajoutPanierMaillot(Request $request, Maillot $maillot, EntityManagerInterface $em): Response
    {
        if($maillot!=null){
            if($this->getUser()->getPanier()==null){
                $panier = new Panier();
            } else {
                $panier = $this->getUser()->getPanier();
            }
            $inserer = new Inserer();
            $inserer->setPanier($panier);
            $inserer->setMaillot($maillot);
            $inserer->setQuantite(1);
            $panier->addInserer($inserer);
            $this->getUser()->setPanier($panier);
            $em->persist($inserer);
            $em->persist($panier);
            $em->persist($this->getUser());
            $em->flush();
            $this->addFlash('notice', 'Maillot Ajouté');
        }
        return $this->redirectToRoute('app_panier');
    }
    #[Route('/private-ajout-panier-box/{id}', name:'app_ajout_panier_box')]
    public function ajoutPanierBox(Request $request, Box $box, EntityManagerInterface $em): Response
    {
        if($box!=null){
            if($this->getUser()->getPanier()==null){
                $panier = new Panier();
            } else {
                $panier = $this->getUser()->getPanier();
            }
            $inserer = new Inserer();
            $inserer->setPanier($panier);
            $inserer->setBox($box);
            $inserer->setQuantite(1);
            $panier->addInserer($inserer);
            $this->getUser()->setPanier($panier);
            $em->persist($inserer);
            $em->persist($panier);
            $em->persist($this->getUser());
            $em->flush();
            $this->addFlash('notice', 'Box ajouté');
        }
        return $this->redirectToRoute('app_panier');
    }
}
