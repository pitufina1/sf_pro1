<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Perro;
use App\Form\PerroType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

	/**
	 * @Route("/perro")
	 */
class PerroController extends Controller
{
    private $vectorperros = array();

    private function cargarDatos () {
        $this->vectorperros [] = (new Perro()) ->setNombre("Lassie") ->setRaza("Labrador");
        $this->vectorperros [] = (new Perro()) ->setNombre("Curro") ->setRaza("Collie");
        $this->vectorperros [] = (new Perro()) ->setNombre("Cobbie") ->setRaza("Chiguagua");

        $p1 = new Perro();
        $p1 ->setNombre("Trumpy");
        $p1 ->setRaza("AlaskaMalamute");
        $this->vectorperros[] = $p1;

    }

    /**
     * @Route("/lista", name="perro_lista")
     */
    public function listado()
    {
    	//Conseguir desde la base de datos
        $this->cargarDatos();
        dump ($this->vectorperros);
        return $this->render ('perro/index.html.twig', [
            'vectorperros' =>  $this->vectorperros,
        ]);
    }

    /**
     * @Route("/nuevo", name="perro_nuevo")
     */
    public function nuevo(Request $request)
    {
        //Conseguir desde la base de datos

        $perro = new Perro();
        $formu = $this->createForm(PerroType::class, $perro);
        $formu->handleRequest($request);

        if ($formu->isSubmitted()) {
            dump ($perro);
            return $this->render('perro/final.html.twig', [
            ]);
        }

        return $this->render ('perro/nuevo.html.twig', [
            'formulario' => $formu -> createView(),
        ]);  
    }
}