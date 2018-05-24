<?php

namespace App\Controller;

use App\Entity\Consulta;
use App\Form\ConsultaType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

	   /**
     * @Route("/consulta")
     */
class ConsultaController extends Controller
{
    /**
     * @Route("/nuevo", name="consulta_nuevo")
     */
    public function index(Request $request)
    {
    	$consulta = new Consulta ();
    	$formu = $this->createForm(ConsultaType::class, $consulta);
    	$formu->handleRequest($request);

    	if ($formu->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($consulta);
            $em->flush();
            
            return $this->redirectToRoute('consulta_lista');
      	}
            return $this->render('consulta/nuevo.html.twig', [
            'formulario' => $formu ->createView(),
        ]);
    }

    /**
     * @Route("/lista", name="consulta_lista")
     */
    public function listado()
    {
        $repo = $this->getDoctrine()->getRepository(Consulta::class);
        
        $consultas = $repo->findAll();
        
            return $this->render ('consulta/index.html.twig', [
            'consultas' =>  $consultas,
        ]);
    }
}
