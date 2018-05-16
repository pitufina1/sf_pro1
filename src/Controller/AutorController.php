<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Autor;
use App\Form\AutorType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/autor")
 */
class AutorController extends Controller
{
    /**
     * @Route("/nuevo", name="autor_nuevo")
     */
public function index(Request $request)
    {
    	$autor = new Autor ();
    	$formu = $this->createForm(AutorType::class, $autor);
    	$formu->handleRequest($request);

    	if ($formu->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($autor);
            $em->flush();
            
            return $this->redirectToRoute('autor_lista');
      	}

            return $this->render('autor/nuevo.html.twig', [
            'formulario' => $formu ->createView(),
        ]);
    }

    /**
     * @Route("/lista", name="autor_lista")
     */
    public function listado()
    {
        $repo = $this->getDoctrine()->getRepository(Autor::class);
        
        $autores = $repo->findAll();
        
            return $this->render ('autor/index.html.twig', [
            'autores' =>  $autores,
        ]);
    }
}










