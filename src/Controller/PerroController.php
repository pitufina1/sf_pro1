<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PerroController extends Controller
{
    /**
     * @Route("/perro", name="perro")
     */
    public function index()
    {
        return $this->render('perro/index.html.twig', [
            'controller_name' => 'PerroController',
        ]);
    }
}
