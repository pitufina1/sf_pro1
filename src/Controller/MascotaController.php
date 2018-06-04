<?php

namespace App\Controller;

use App\Entity\Mascota;
use App\Form\MascotaType;
use App\Repository\MascotaRepository;

use App\Entity\Cliente;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
   * @Route("/mascota")
   */
class MascotaController extends Controller
{

    /**
     * @Route("/", name="mascota_index")
     */
    public function index(MascotaRepository $mascotaRepository): Response
    {
        return $this->render('mascota/index.html.twig', ['mascotas' => $mascotaRepository->findAll()]);
    }

    /**
     * @Route("/nuevo", name="mascota_nuevo")
     */
    public function nuevo(Request $request)
    {
    	$mascota = new Mascota ();
    	$formu = $this->createForm(MascotaType::class, $mascota);
    	$formu->handleRequest($request);

    	if ($formu->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($mascota);
            $em->flush();
          
            return $this->redirectToRoute('mascota_index');
      	}

            return $this->render('mascota/nuevo.html.twig', [
            'formulario' => $formu ->createView(),
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
