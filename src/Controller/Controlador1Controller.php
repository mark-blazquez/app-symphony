<?php

namespace App\Controller;
/*
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Controlador1Controller extends AbstractController
{
    #[Route('/controlador1', name: 'app_controlador1')]
    public function index(): Response
    {
        return $this->render('controlador1/index.html.twig', [
            'controller_name' => 'Controlador1Controller',
        ]);
    }
}*/
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

$process = new Process(['/usr/bin/kubectl', 'get','all']);

$process->run();

// executes after the command finishes
if (!$process->isSuccessful()) {
    throw new ProcessFailedException($process);
}

echo $process->getOutput();