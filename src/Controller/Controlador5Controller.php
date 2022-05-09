<?php



namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class Controlador5Controller extends AbstractController
{
    #[Route('/controlador5', name: 'app_controlador5')]
    public function index(): Response
    {
		$process = new Process(['/usr/sbin/service', 'nginx', 'status']);

		$process->run();

		// executes after the command finishes
		if (!$process->isSuccessful()) {
			throw new ProcessFailedException($process);
		}

		$kubernetes = $process->getOutput();
		$kubernetes = str_replace(PHP_EOL, '<br>', $kubernetes);

		//$kubernetes = str_replace('<br>', '<tr><td>', $kubernetes);


       return $this->render('controlador5/index.html.twig', [
            'controller_name' => 'Controlador1Controller',
			'info_app' => $kubernetes ,
        ]);
    }
}

