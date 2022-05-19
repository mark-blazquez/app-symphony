<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class ReiniciarController extends AbstractController
{
    #[Route('/reiniciar', name: 'app_reiniciar')]
    public function index(): Response
    {
        $process = new Process(['sudo','/usr/sbin/service', 'nginx', 'restart']);

		$process->run();



		return $this->render('reiniciar/index.html.twig', [
            'mensaje' => 'accion realizada reinicio realizado',
        ]);
    }
}
