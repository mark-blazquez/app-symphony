<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class PararController extends AbstractController
{
    #[Route('/parar', name: 'app_parar')]
    public function index(Request $request): Response
    {
		$cookies = $request->cookies;

		if ($cookies->has('usuario')){
			//proceso para parar servicio
			$process = new Process(['sudo','/usr/sbin/service', 'nginx', 'stop']);
			//ejecuta
			$process->run();
			//errores
			if (!$process->isSuccessful()) {
				throw new ProcessFailedException($process);
			}
			//manda mensaje de estado al front
			return $this->render('parar/index.html.twig', [
				'mensaje' => 'accion realizada, parada de servicio correcta',
			]);
		}else {
			return new RedirectResponse('https://torre-ubuntu.ddns.net:8888');

		}
    }
}
