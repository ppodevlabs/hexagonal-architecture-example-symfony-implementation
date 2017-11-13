<?php

namespace AppBundle\Controller;

use AppBundle\Command\CommandBus;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Voiceworks\HexagonalApp\Application\Command\CreateUserCommand;
use Voiceworks\HexagonalApp\Domain\BadCommandException;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $bus = $this->get(CommandBus::class);

        try {
            $command = new CreateUserCommand(
                array(
                    'username' => 'pedro1',
                    'password' => 'pass',
                    'email' => 'pedro1@gmail.com'
                )
            );
            $bus->execute($command);
        } catch (BadCommandException $exception) {
            die($exception->getMessage());
        }
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
}
