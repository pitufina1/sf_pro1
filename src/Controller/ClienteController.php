<?php

namespace App\Controller;

use App\Entity\Cliente;
use App\Form\ClienteType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


	/**
     * @Route("/cliente")
     */
class ClienteController extends Controller
{
    /**
     * @Route("/nuevo", name="cliente_nuevo")
     */
    public function index(Request $request)
    {
    	$cliente = new Cliente ();
    	$formu = $this->createForm(ClienteType::class, $cliente);
    	$formu->handleRequest($request);

    	if ($formu->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($cliente);
            $em->flush();
            
            return $this->redirectToRoute('cliente_lista');
      	}

            return $this->render('cliente/nuevo.html.twig', [
            'formulario' => $formu ->createView(),
        ]);
    }

    /**
     * @Route("/lista", name="cliente_lista")
     */
    public function listado()
    {
        $repo = $this->getDoctrine()->getRepository(Cliente::class);
        
        $clientes = $repo->findAll();
        
            return $this->render ('cliente/index.html.twig', [
            'clientes' =>  $clientes,
        ]);
    }

    /**
     * @Route("/detalle/{id}", name="cliente_detalle", requirements={"id"="\d+"})
     */
    public function detalle($id)
    {
        $repo = $this->getDoctrine()->getRepository(Cliente::class);
        
        $cliente = $repo->find($id);
                   
            return $this->render ('cliente/detalle.html.twig', [
            'clientes' =>  $clientes,
        ]);
    }
}
