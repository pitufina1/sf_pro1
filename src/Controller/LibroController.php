<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Libro;
use App\Form\LibroType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/libro")
 */
class LibroController extends Controller
{

 	/**
     * @Route("/nuevo", name="libro_nuevo")
     */
public function index(Request $request)
    {
    	$libro = new Libro ();
    	$formu = $this->createForm(LibroType::class, $libro);
    	$formu->handleRequest($request);

    	if ($formu->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($libro);
            $em->flush();
            
            return $this->redirectToRoute('libro_lista');
      	}

            return $this->render('libro/nuevo.html.twig', [
            'formulario' => $formu ->createView(),
        ]);
    }

    /**
     * @Route("/lista", name="libro_lista")
     */
    public function listado()
    {
        $repo = $this->getDoctrine()->getRepository(Libro::class);
        
        $libros = $repo->findAll();
        
            return $this->render ('libro/index.html.twig', [
            'libros' =>  $libros,
        ]);
    }
}