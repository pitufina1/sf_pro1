<?php

namespace App\Controller;

use App\Entity\Mascota;
use App\Entity\Cliente;
use App\Form\MascotaType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

	/**
     * @Route("/mascota")
     */
class MascotaController extends Controller
{
    /**
     * @Route("/nuevo", name="mascota_nuevo")
     */
    public function index(Request $request)
    {
    	$mascota = new Mascota ();
    	$formu = $this->createForm(MascotaType::class, $mascota);
    	$formu->handleRequest($request);

    	if ($formu->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($mascota);
            $em->flush();
          
            return $this->redirectToRoute('mascota_lista');
      	}

            return $this->render('mascota/nuevo.html.twig', [
            'formulario' => $formu ->createView(),
        ]);
    }

    /**
     * @Route("/lista", name="mascota_lista")
     */
    public function listado()
    {
        $repo = $this->getDoctrine()->getRepository(Mascota::class);
        
        $mascotas = $repo->findAll();
        
            return $this->render ('mascota/index.html.twig', [
            'mascotas' =>  $mascotas,
        ]);
    }

    /**
     * @Route("/detalle/{id}", name="mascota_detalle", requirements={"id"="\d+"})
     */
    public function detalle($id)
    {
        $repo = $this->getDoctrine()->getRepository(Mascota::class);
        
        $mascotas = $repo->findAll($id);
        
            return $this->render ('mascota/detalle.html.twig', [
            'mascotas' =>  $mascotas,
        ]);
    }
}
