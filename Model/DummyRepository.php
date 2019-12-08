<?php
declare(strict_types=1);

/**
 * Repository Class
 * @category    Ticaje
 * @package     Ticaje_Dummy
 * @author      Hector Luis Barrientos <ticaje@filetea.me>
 */

namespace Ticaje\Dummy\Model;

use Magento\Framework\Api\SearchResultsInterfaceFactory;

use Ticaje\Core\Repository\Base\BaseRepository;
use Ticaje\Dummy\Model\ResourceModel\Dummy\CollectionFactory;

/**
 * Class DummyRepository
 * @package Ticaje\Dummy\Model
 */
class DummyRepository extends BaseRepository
{
    /**
     * DummyRepository constructor.
     * @param DummyFactory $dummyFactory
     * @param CollectionFactory $collectionFactory
     * @param SearchResultsInterfaceFactory $searchResultsFactory
     */
    public function __construct(
        DummyFactory $dummyFactory,
        CollectionFactory $collectionFactory,
        SearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->objectFactory = $dummyFactory;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
    }
}
