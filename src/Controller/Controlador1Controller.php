<?php
/*use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
$process = new Process(['/usr/bin/kubectl', 'get', 'pod']);

		$process->run();

		// executes after the command finishes
		if (!$process->isSuccessful()) {
			throw new ProcessFailedException($process);
		}

		$kubernetes = $process->getOutput();
		$kubernetes = str_replace(PHP_EOL, '<br>', $kubernetes);
		$kubernetes = str_replace(" "," ", $kubernetes);

		$array = explode(" ", $kubernetes);
		foreach($array as $nombre){
			echo $nombre ;
			echo "-" ;

		};
*/

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class Controlador1Controller extends AbstractController
{
    #[Route('/controlador1', name: 'app_controlador1')]
    public function index(): Response
    {
		$process = new Process(['/usr/bin/kubectl', 'get', 'pod']);

		$process->run();

		// executes after the command finishes
		if (!$process->isSuccessful()) {
			throw new ProcessFailedException($process);
		}

		$kubernetes = $process->getOutput();
		$kubernetes = str_replace(PHP_EOL, '<br>', $kubernetes);
		$kubernetes = str_replace(" ","-", $kubernetes);

		$array = explode(" ", $kubernetes);
		foreach($array as $nombre){
			echo $nombre;
		};



       return $this->render('controlador1/index.html.twig', [
            'controller_name' => 'Controlador1Controller',
			'info_app' => $kubernetes ,
        ]);
    }
}
