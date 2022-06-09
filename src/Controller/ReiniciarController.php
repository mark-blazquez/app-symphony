<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class ReiniciarController extends AbstractController
{
    #[Route('/reiniciar', name: 'app_reiniciar')]
    public function index(Request $request): Response
    {
		$cookies = $request->cookies;

		if ($cookies->has('usuario')){
			//proceso de reinicio
			$process = new Process(['sudo','/usr/sbin/service', 'nginx', 'restart']);
			//ejecucion
			$process->run();
			//manda mensaje de estado al front
			return $this->render('reiniciar/index.html.twig', [
				'mensaje' => 'accion realizada reinicio realizado',
			]);
		}else {
			return new RedirectResponse('https://torre-ubuntu.ddns.net:8888');

		}
    }
}
