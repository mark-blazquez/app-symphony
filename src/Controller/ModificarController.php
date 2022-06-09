<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class ModificarController extends AbstractController
{
    #[Route('/modificar', name: 'app_modificar')]
    public function index(Request $request): Response
    {
		$cookies = $request->cookies;
		//las comprobaciones de las cookies
		if ($cookies->has('usuario')){
			//variable que recoeje los datos del form 
			$request2 = Request::createFromGlobals();
			//mete en variables la correspondiente a nombre y numero
			$nombre=$request2->request->get('nombre');
			$numero=$request2->request->get('numero');
			//echo $nombre;
			//echo $numero;
			//le pasa el proceso de modificacion de numero de pod con el nombre y numero
			$process = new Process(['/usr/bin/kubectl','scale',"deployment.apps/$nombre","--replicas=$numero"]);
			//ejecuta
			$process->run();
			//comprobacion de errores
			if (!$process->isSuccessful()) {
				throw new ProcessFailedException($process);
			}
			//lo pasa al front con un mensaje de estado 
			return $this->render('modificar/index.html.twig', [
				'mensaje' => 'accion realizada, numero de pod modificado',
			]);
		}else {
			return new RedirectResponse('https://torre-ubuntu.ddns.net:8888');

		}
    }
}
