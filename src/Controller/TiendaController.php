<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

	/**
     * @Route("/tienda")
     */
class TiendaController extends Controller
{
	const EMPLEADOS = array("Ángela", "Rita", "Pedro", "Erika", "Juan");
    /**
     * @Route("", name="tienda_empleados")
     */
    public function listarEmpleados()
    {
        return $this->render('tienda/index.html.twig', [
            'empleados' => self::EMPLEADOS
        ]);
    }

    /**
     * @Route("/detalle/{id}", name="tienda_detalle", requirements={"id"="\d+"})
     */
    public function detalleEmpleado($id)
    {
        return $this->render('tienda/detalle.html.twig', [
            'empleado' => self::EMPLEADOS[$id]
        ]);
    }



}

