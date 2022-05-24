<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;

class IndexController extends AbstractController
{
    #[Route('/index', name: 'app_index')]
    public function index(Request $request)
    {	
		$cookies = $request->cookies;

		if ($cookies->has('usuario')){
			return $this->render('index/index.html.twig', [
				'controller_name' => 'IndexController',
			]);
		}else {
			return new RedirectResponse('https://torre-ubuntu.ddns.net/:8080');

		}
		
    }
}
