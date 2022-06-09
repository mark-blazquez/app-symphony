<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Cookie;




class CerrarController extends AbstractController
{
    #[Route('/cerrar', name: 'app_cerrar')]
    public function index(Request $request): Response
    {	//obtiene todas las cookies
		$cookies = $request->cookies;
		//revisa si existe la cookie usuario  que es la que se crea en el inmicio de sesion 
		if ($cookies->has('usuario')){
			//mete en una variable la vista a la que se va a mandar
			$view = $this->render('cerrar/index.html.twig', [
				'controller_name' => 'CerrarController',
			]);
				
			//crea la la respuesta para el usuario que sera enviarlo a la vista 
			$res = new Response($view);
			// a la respuesta le va a pasar la cabecera de eliminar la cookie usuario
			$res->headers->clearCookie('usuario');
			//envia la respuesta
			$res->send();

		}else {
			//la comprobacion de la existencia de la cookie que te envia al inicio de sesion
			return new RedirectResponse('https://torre-ubuntu.ddns.net:8888');

		}

    }
	
}
