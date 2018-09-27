<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BretaigneController extends AbstractController
{
    /**
     * @Route("/bretaigne", name="bretaigne")
     */
    public function index()
    {
        return $this->render('bretaigne/index.html.twig', [
            'controller_name' => 'BretaigneController',
        ]);
    }

    /**
     * @Route("/bretaigne/map", name="map")
     */
    public function home() {
        return $this->render('bretaigne/home.html.twig', [
            'title' => "Welcome !!",
            'age' => "20"
            ]);

    }
}
