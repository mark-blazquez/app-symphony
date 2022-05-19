<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class PararController extends AbstractController
{
    #[Route('/parar', name: 'app_parar')]
    public function index(): Response
    {
		$process = new Process(['sudo','/usr/sbin/service', 'nginx', 'stop']);

		$process->run();

		if (!$process->isSuccessful()) {
			throw new ProcessFailedException($process);
		}


		return $this->render('parar/index.html.twig', [
            'mensaje' => 'accion realizada, parada de servicio correcta',
        ]);
    }
}
