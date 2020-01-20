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

use Ticaje\Connector\Gateway\Client\Rest as RestClient;
use Ticaje\Connector\Interfaces\ClientInterface;
use Ticaje\Connector\Interfaces\Provider\Token\TokenProviderInterface;

/**
 * Class Instantiate
 * @package Ticaje\Connector\Command
 */
class Connector extends Command
{
    protected $client;

    protected $tokenProvider;

    public function __construct(
        RestClient $client,
        TokenProviderInterface $tokenProvider,
        string $name = null
    ) {
        $this->client = $client;
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
        $credentials = [
            ClientInterface::BASE_URI_KEY => 'https://dummy-domain.com:8443/'
        ];
        $params = [
            'grant_type' => 'example',
            'scope' => 'example',
            'client_id' => 'example',
            'client_secret' => 'example',
            'username' => 'example'
        ];
        $token = $this->tokenProvider
            ->initialize($credentials)
            ->setParams($params)
            ->getAccessToken();
        $output->writeln($token);
    }
}
