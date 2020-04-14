<?php
declare(strict_types=1);

/**
 * Command Class
 * @category    Ticaje
 * @package     Ticaje_Dummy
 * @author      Hector Luis Barrientos <ticaje@filetea.me>
 */

namespace Ticaje\Dummy\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Ticaje\AConnector\Interfaces\Provider\Token\TokenProviderInterface;

/**
 * Class Instantiate
 * @package Ticaje\Connector\Command
 */
class Connector extends Command
{
    protected $tokenProvider;

    public function __construct(
        TokenProviderInterface $tokenProvider,
        string $name = null
    ) {
        $this->tokenProvider = $tokenProvider;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setName("ticaje:test:connector");
        $this->setDescription("Test Connector Extension.");
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $params = [
            'grant_type' => 'example',
            'scope' => 'example',
            'client_id' => 'example',
            'client_secret' => 'example',
            'username' => 'example'
        ];
        $token = $this->tokenProvider
            ->setParams($params)
            ->getAccessToken();
        $output->writeln($token);
    }
}
