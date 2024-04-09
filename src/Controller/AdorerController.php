<?php

namespace App\Controller;

use App\Entity\Box;
use App\Entity\Maillot;
use App\Repository\BoxRepository;
use App\Repository\MaillotRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdorerController extends AbstractController
{
    #[Route('/private-adorer-box/{id}', name: 'app_adorer_box')]
    public function adorerBox(Box $box, EntityManagerInterface $em): Response
    {
        if ($this->getUser()->getAdorerBox()->contains($box)){
            $this->getUser()->removeAdorerBox($box);    
         } else {
             $this->getUser()->addAdorerBox($box);
         }
         $em->persist($this->getUser());
         $em->flush();
         return $this->redirectToRoute('app_box');
    }

    #[Route('/private-adorer-maillot/{id}', name: 'app_adorer_maillot')]
    public function adorerMaillot(Maillot $maillot, EntityManagerInterface $em): Response
    {
        if ($this->getUser()->getAdorer()->contains($maillot)){
           $this->getUser()->removeAdorer($maillot);    
        } else {
            $this->getUser()->addAdorer($maillot);
        }
        $em->persist($this->getUser());
        $em->flush();
        return $this->redirectToRoute('app_maillot');
    }
}
