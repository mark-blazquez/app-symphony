<?php



namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class Controlador5Controller extends AbstractController
{
    #[Route('/controlador5', name: 'app_controlador5')]
    public function index(Request $request): Response
    {
		$cookies = $request->cookies;

		if ($cookies->has('usuario')){
			$process = new Process(['/usr/sbin/service', 'nginx', 'status']);

			$process->run();
	/*
			// executes after the command finishes
			if (!$process->isSuccessful()) {
				throw new ProcessFailedException($process);
			}
	*/
			$nginx = $process->getOutput();
			$nginx = str_replace(PHP_EOL, '<br>', $nginx);



		return $this->render('controlador5/index.html.twig', [
				'controller_name' => 'Controlador1Controller',
				'info_app' => $nginx ,
			]);
		}else {
			return new RedirectResponse('https://192.168.1.132:8080');

		}
    }
}

