<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;


class Controlador1Controller extends AbstractController
{
    #[Route('/controlador1', name: 'app_controlador1')]
    public function index(Request $request): Response
    {
		$cookies = $request->cookies;
		//la comprobacion de cookie que si existe entra
		if ($cookies->has('usuario')){
			//el proceso de turno en este caso el de los pod
			$process = new Process(['/usr/bin/kubectl', 'get', 'pod']);
			//lo ejecuta
			$process->run();
			//la comprobacion de errores
			if (!$process->isSuccessful()) {
				throw new ProcessFailedException($process);
			}
			//mete en la variable kubernetes lo que sale por pantalla
			$kubernetes = $process->getOutput();
			//sustituye los saltos de lineas que viene de lo grafico por saltos de lineas html
			$kubernetes = str_replace(PHP_EOL, '<br>', $kubernetes);
			//sustituye todos los espacios por barrabajas porque los espacios no lo identifica bien y asi  le puedo darun formateo bueno en lo grafico
			$kubernetes = str_replace(" ","_", $kubernetes);
			//sustituye todas las comprobaciones de barrabajas por termiinacion e inicio de tabla
			$kubernetes = str_replace("______________________","</td><td>", $kubernetes);
			$kubernetes = str_replace("______________________","</td><td>", $kubernetes);
			$kubernetes = str_replace("_____________________","</td><td>", $kubernetes);
			$kubernetes = str_replace("____________________","</td><td>", $kubernetes);
			$kubernetes = str_replace("___________________","</td><td>", $kubernetes);
			$kubernetes = str_replace("__________________","</td><td>", $kubernetes);
			$kubernetes = str_replace("_________________","</td><td>", $kubernetes);
			$kubernetes = str_replace("________________","</td><td>", $kubernetes);
			$kubernetes = str_replace("_______________","</td><td>", $kubernetes);
			$kubernetes = str_replace("______________","</td><td>", $kubernetes);
			$kubernetes = str_replace("_____________","</td><td>", $kubernetes);
			$kubernetes = str_replace("____________","</td><td>", $kubernetes);
			$kubernetes = str_replace("___________","</td><td>", $kubernetes);
			$kubernetes = str_replace("__________","</td><td>", $kubernetes);
			$kubernetes = str_replace("_________","</td><td>", $kubernetes);
			$kubernetes = str_replace("________","</td><td>", $kubernetes);
			$kubernetes = str_replace("_______","</td><td>", $kubernetes);
			$kubernetes = str_replace("______","</td><td>", $kubernetes);
			$kubernetes = str_replace("_____","</td><td>", $kubernetes);
			$kubernetes = str_replace("____","</td><td>", $kubernetes);
			$kubernetes = str_replace("___","</td><td>", $kubernetes);
			$kubernetes = str_replace("__","</td><td>", $kubernetes);
			//$kubernetes = str_replace("_","</td><td>", $kubernetes);
			//sustituye la terminacion de la fila que tiene el br por el final de una tabla
			$kubernetes = str_replace('<br>', '<tr><td>', $kubernetes);
			//le pasa al front end la variable kubernetes para que lo muestre por pantalla 
			return $this->render('controlador1/index.html.twig', [
				'controller_name' => 'Controlador1Controller',
				'info_app' => $kubernetes ,
			]);
		}else {
			//reenvia a inicio de sesion si no existe la cookie
			return new RedirectResponse('https://torre-ubuntu.ddns.net:8888');

		}
		
    }
}
