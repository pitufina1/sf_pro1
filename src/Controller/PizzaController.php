<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PizzaController extends Controller
{
    /**
     * @Route("/pizza", name="pizza")
     */
    public function index()
    {
    	$vector = array ("Margarita", "Carbonara", "Hawaiana");
    	$vector1 = array ("Queso", "Tomate", "Peperoni");

        return $this->render('pizza/index.html.twig', [
            'controller_name' => 'PizzaController',
            'minombre'=> 'Carmen',
            'pizzas'=> $vector,
            'ingredientes' => $vector1
        ]);
    }

    /**
     * @Route("/pizza/nuevo", name="pizza_nuevo")
     */
    public function nuevaPizza()
    {
        return $this->render('pizza/index.html.twig', [
            
        ]);
    }

}
