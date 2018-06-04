<?php

namespace App\Controller;

use App\Entity\Cliente;
use App\Form\ClienteType;
use App\Repository\ClienteRepository;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

   /**
 * @Route("/cliente")
 */
class ClienteController extends Controller
{

    /**
    *@Route("/", name="cliente_index")
    */
    public function index(ClienteRepository $clienteRepository): Response
    {
        return $this->render('cliente/index.html.twig', [c'clientes' => $clienteRepository->findAll()]);
    }

    /**
     * @Route("/nuevo", name="cliente_nuevo")
     */
    public function nuevo(Request $request): Response
    {
    	$cliente = new Cliente ();
    	$formu = $this->createForm(ClienteType::class, $cliente);
    	$formu->handleRequest($request);

    	if ($formu->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($cliente);
            $em->flush();
            
            return $this->redirectToRoute('cliente_index');
      	}

            return $this->render('cliente/nuevo.html.twig', [
            'formulario' => $formu ->createView(),
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
            'cliente' =>  $cliente,
        ]);
    }

    /**
     * @Route("/jsonlist", name="cliente_jsonlist")
     */
    public function jsonClientes()
    {

        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();

        $normalizer->setCircularReferenceHandler(
            function ($object) {
                return $object->getId();
            }
        );

        $serializer = new Serializer(array($normalizer), array($encoder));

        $repo = $this->getDoctrine()->getRepository(Cliente::class);
        $clientes = $repo->findAll();
        $jsonClientes = $serializer->serialize($clientes, 'json');        

        $respuesta = new Response($jsonClientes);

        return $respuesta;
    }
}
