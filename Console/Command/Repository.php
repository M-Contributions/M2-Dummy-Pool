<?php
declare(strict_types=1);

/**
 * Command Class
 * @category    Ticaje
 * @package     Ticaje_Dummy
 * @author      Hector Luis Barrientos <ticaje@filetea.me>
 */

namespace Ticaje\Dummy\Console\Command;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\ObjectManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Ticaje\Core\Repository\Base\BaseRepositoryInterface;

/**
 * Class Repository
 * @package Ticaje\Dummy\Console\Command
 */
class Repository extends Command
{
    private $dummyRepository;

    private $om;

    public function __construct(
        BaseRepositoryInterface $dummyRepository,
        ObjectManagerInterface $objectManager,
        string $name = null
    ) {
        $this->dummyRepository = $dummyRepository;
        $this->om = $objectManager;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setName("ticaje:test:repository");
        $this->setDescription("A command the programmer was too lazy to enter a description for.");
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
     * Creating room for launching any repository method
     * @todo Refactor later on
     */
    protected function launch(OutputInterface $output)
    {
        $this->getList();
        $output->writeln("Launching repository command...");
    }

    protected function getList()
    {
        $criteriaBuilder = $this->om->get(SearchCriteriaBuilder::class);
        $criteriaBuilder->addFilter('reference_id', 3);
        $criteria = $criteriaBuilder->create();
        $list = $this->dummyRepository->getList($criteria);
        print_r($list->getItems()[1]->getData());
    }

    protected function getSingle()
    {
        $criteriaBuilder = $this->om->get(SearchCriteriaBuilder::class);
        $criteriaBuilder->addFilter('reference_id', 3);
        $criteria = $criteriaBuilder->create();
        $single = $this->dummyRepository->getSingle($criteria);
        print_r($single->getData());
    }

    protected function getById()
    {
        $object = $this->dummyRepository->getById(3);
        print_r($object ? $object->getData() : 'Not found');
    }

    protected function deleteById()
    {
        $delete = $this->dummyRepository->deleteById(1);
        print_r($delete);
    }
}
