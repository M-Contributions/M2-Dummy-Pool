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
use Ticaje\Dummy\Model\Dummy;
use Ticaje\Persistence\Repository\Base\BaseRepositoryInterface;
use Ticaje\Dummy\Model\DummyFactory;

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
     *
     * @todo Refactor later on
     */
    protected function launch(OutputInterface $output)
    {
        $output->writeln("Launching repository command...");
        $this->create();
    }

    protected function getList()
    {
        /** @var SearchCriteriaBuilder $criteriaBuilder */
        $criteriaBuilder = $this->om->get(SearchCriteriaBuilder::class);
        $criteriaBuilder->addFilter('reference_id', [1,2,3], 'in');
        $criteria = $criteriaBuilder->create();
        $list = $this->dummyRepository->getList($criteria);
        $elements = $list->getTotalCount() > 0 ? (function () use ($list) {
            /** @var \Magento\Framework\Api\SearchResultsInterface $list */
            $items = $list->getItems();
            $r = [];
            foreach ($items as $item) {
                $r[] = $item->getData();
            }

            return $r;
        }) () : null;
        print_r($elements);
    }

    protected function getSingle()
    {
        $criteriaBuilder = $this->om->get(SearchCriteriaBuilder::class);
        $criteriaBuilder->addFilter('reference_id', 3);
        $criteria = $criteriaBuilder->create();
        $single = $this->dummyRepository->getSingle($criteria);
        print_r($single ? $single->getData() : 'Not Found');
    }

    protected function getById()
    {
        $object = $this->dummyRepository->getById(2);
        print_r($object ? $object->getData() : 'Not Found');
    }

    protected function deleteById()
    {
        $delete = $this->dummyRepository->deleteById(10);
        print_r($delete);
    }

    protected function create()
    {
        /** @var Dummy $dummy */
        $dummy = $this->om->get(DummyFactory::class)->create();
        $dummy->setData([
            'reference_id' => 3,
            'title'        => 'A new title',
            'description'  => 'A new Description',
            'time'         => time(),
        ]);
        $create = $this->dummyRepository->save($dummy);
        print_r($create->getData());
    }
}
