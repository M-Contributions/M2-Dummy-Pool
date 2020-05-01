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

use Ticaje\Dummy\Configuration\GeneralInterface;

/**
 * Class Configuration
 * @package Ticaje\Dummy\Console\Command
 */
class Configuration extends Command
{
    private $generalConfiguration;

    public function __construct(
        GeneralInterface $generalConfiguration,
        string $name = null
    ) {
        $this->generalConfiguration = $generalConfiguration;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setName("ticaje:test:configuration");
        $this->setDescription("Testing configurations refactor workaround.");
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Starting command...");
        $this->launch($output);
        $output->writeln("Finishing command...");
    }

    /**
     * @param OutputInterface $output
     * Creating room for launching any config method
     * @todo Refactor later on
     */
    protected function launch(OutputInterface $output)
    {
        $output->writeln("Launching config command...");
        $enabled =  $this->generalConfiguration->isEnabled();
        $debug =  $this->generalConfiguration->inDebugMode();
        $output->writeln("Enabled: $enabled");
        $output->writeln("Debug Mode: $debug");
    }
}
