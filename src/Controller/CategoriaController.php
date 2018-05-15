<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Categoria;
use App\Form\CategoriaType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

	/**
     * @Route("/categoria")
     */
class CategoriaController extends Controller
{
   
    /**
     * @Route("/nuevo", name="categoria_nuevo")
     */
    public function index(Request $request)
    {
    	$categoria = new Categoria ();
    	$formu = $this->createForm(CategoriaType::class, $categoria);
    	$formu->handleRequest($request);

    	if ($formu->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($categoria);
            $em->flush();
            
            return $this->redirectToRoute('categoria_lista');
      	}

            return $this->render('categoria/nuevo.html.twig', [
            'formulario' => $formu ->createView(),
        ]);
    }
     /**
     * @Route("/lista", name="categoria_lista")
     */
    public function listado()
    {
        $repo = $this->getDoctrine()->getRepository(Categoria::class);
        
        $categorias = $repo->findAll();
        
            return $this->render ('categoria/index.html.twig', [
            'categorias' =>  $categorias,
        ]);
    }
}
