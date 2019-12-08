<?php
declare(strict_types=1);

/**
 * ResourceModel Class
 * @category    Ticaje
 * @package     Ticaje_Dummy
 * @author      Hector Luis Barrientos <ticaje@filetea.me>
 */

namespace Ticaje\Dummy\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Dummy
 * @package Ticaje\Dummy\Model\ResourceModel
 */
class Dummy extends AbstractDb
{
    private $mainTable = 'dummy_table';

    private $primaryKey = 'entity_id';

    protected function _construct()
    {
        $this->_init($this->mainTable, $this->primaryKey);
    }
}
