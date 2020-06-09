<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ApteczkaController extends AbstractController
{
    /**
     * @Route("/apteczka", name="apteczka")
     */
    public function index()
    {
        return $this->render('apteczka/index.html.twig', [
            'controller_name' => 'ApteczkaController',
        ]);
    }
}
