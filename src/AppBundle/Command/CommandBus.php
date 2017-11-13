<?php
/**
 * Created by IntelliJ IDEA.
 * User: pedrop
 * Date: 02/11/2017
 * Time: 09:15
 */

namespace AppBundle\Command;

use SimpleBus\Message\Bus\MessageBus;
use Voiceworks\HexagonalApp\Domain\Command;
use Voiceworks\HexagonalApp\Application\CommandBus as BaseCommandBus;

class CommandBus implements BaseCommandBus
{
    /**
     * @var MessageBus
     */
    private $messageBus;

    public function __construct(MessageBus $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    public function execute(Command $command)
    {
       $this->messageBus->handle($command);
    }
}