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
			//el proceso de recoger el estado de nginx
			$process = new Process(['/usr/sbin/service', 'nginx', 'status']);
			//ejecucion
			$process->run();

			//aqui la comprobacion de errores debe quitarse porque cuando esta apagado lo detecta como error		
			/*if (!$process->isSuccessful()) {
				throw new ProcessFailedException($process);
			}*/
			//obtencion del lo grafico
			$nginx = $process->getOutput();
			//sustitucion de los saltos de linea, aqui no hace falta hacer lo de la tabla porque es una texto plano
			$nginx = str_replace(PHP_EOL, '<br>', $nginx);
			//lo pasa al front
			return $this->render('controlador5/index.html.twig', [
				'controller_name' => 'Controlador1Controller',
				'info_app' => $nginx ,
			]);
		}else {
			return new RedirectResponse('https://torre-ubuntu.ddns.net:8888');

		}
    }
}

