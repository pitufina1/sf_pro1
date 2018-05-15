<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Explotacion;
use App\Form\ExplotacionType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

	/**
     * @Route("/explotacion")
     */
class ExplotacionController extends Controller
{
	/**
     * @Route("/nuevo", name="explotacion_nuevo")
     */
    public function index(Request $request)
    {
    	$explotacion= new Explotacion ();
    	$formu = $this->createForm(ExplotacionType::class, $explotacion);
    	$formu->handleRequest($request);

    	if ($formu->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($explotacion);
            $em->flush();
            
            return $this->redirectToRoute('explotacion_lista');
      	}

            return $this->render('explotacion/nuevo.html.twig', [
            'formulario' => $formu ->createView(),
        ]);
    }
     /**
     * @Route("/lista", name="explotacion_lista")
     */
    public function listado()
    {
        $repo = $this->getDoctrine()->getRepository(Explotacion::class);
        
        $explotaciones = $repo->findAll();
        
            return $this->render ('explotacion/index.html.twig', [
            'explotaciones' =>  $explotaciones,
        ]);
    }
}
