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
		$kubernetes = str_replace(" ","_", $kubernetes);
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
		$kubernetes = str_replace('<br>', '<tr><td>', $kubernetes);








       return $this->render('controlador1/index.html.twig', [
            'controller_name' => 'Controlador1Controller',
			'info_app' => $kubernetes ,
        ]);
    }
}
