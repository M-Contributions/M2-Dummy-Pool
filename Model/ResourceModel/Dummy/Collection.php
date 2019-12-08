<?php
declare(strict_types=1);

/**
 * ResourceModel Collection Class
 * @category    Ticaje
 * @package     Ticaje_Dummy
 * @author      Hector Luis Barrientos <ticaje@filetea.me>
 */

namespace Ticaje\Dummy\Model\ResourceModel\Dummy;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

use Ticaje\Dummy\Model\Dummy as ModelClass;
use Ticaje\Dummy\Model\ResourceModel\Dummy as ResourceModelClass;

/**
 * Class Collection
 * @package Ticaje\Dummy\Model\ResourceModel\Dummy
 */
class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(ModelClass::class, ResourceModelClass::class);
    }
}
