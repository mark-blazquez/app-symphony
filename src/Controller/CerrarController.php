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
    {	
		$cookies = $request->cookies;

		if ($cookies->has('usuario')){

			$view = $this->render('cerrar/index.html.twig', [
				'controller_name' => 'CerrarController',
			]);
				
			
			$res = new Response($view);
			$res->headers->clearCookie('usuario');
			$res->send();


		}else {
			return new RedirectResponse('https://192.168.1.132:8080');

		}

    }
	
}
