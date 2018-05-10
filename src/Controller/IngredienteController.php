<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

	/**
     * @Route("ingrediente")
     */
class IngredienteController extends Controller
{
    /**
     * @Route("", name="ingrediente")
     */
    public function index()
    {
        $vector = array ("Oregano", "Peperoni", "Queso");

        return $this->render('ingrediente/index.html.twig', [
            'controller_name' => 'IngredienteController',
            'ingredientes'=> $vector
        ]);
    }

 	/**
     * @Route("/listar", name="ingrediente_listar")
     */
    public function listaIngrediente()
    {
        return $this->render('ingrediente/lista.html.twig', [
            
        ]);
    }

	/**
     * @Route("/mostrar", name="ingrediente_mostrar")
     */
    public function mostrarIngrediente()
    {
        return $this->render('ingrediente/mostrar.html.twig', [
            
        ]);
    }

	/**
     * @Route("/editar", name="ingrediente_editar")
     */
    public function editarIngrediente()
    {
        return $this->render('ingrediente/editar.html.twig', [
            
        ]);
    }
}




