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

use Ticaje\AConnector\Gateway\Client\Ftp as FtpClient;
use Ticaje\AConnector\Gateway\Provider\Credentials as CredentialsManager;

/**
 * Class Instantiate
 * @package Ticaje\Connector\Command
 */
class FtpConnector extends Command
{
    protected $client;

    protected $credentials;

    public function __construct(
        FtpClient $client,
        CredentialsManager $credentials,
        string $name = null
    ) {
        $this->client = $client;
        $this->credentials = $credentials;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setName("ticaje:test:ftp:connector");
        $this->setDescription("Test Connector Extension.");
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $credentials = [
            'username' => 'sftpuser',
            'password' => 'sftpuser',
            'host' => 'localhost',
            'port' => 22,

        ];
        $result = null;
        $this->credentials->set($credentials);
        $connected = $this->client->connect($this->credentials);
        if ($connected) {
            $result = $this->client->download('comeco/sftp/Descriptions.csv');
        }
        $output->write($result, true);
    }
}
