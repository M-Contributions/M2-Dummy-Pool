<?php
declare(strict_types=1);

/**
 * Model Class
 * @category    Ticaje
 * @package     Ticaje_Dummy
 * @author      Hector Luis Barrientos <ticaje@filetea.me>
 */

namespace Ticaje\Dummy\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\DataObject\IdentityInterface;

use Ticaje\Dummy\Model\ResourceModel\Dummy as ResourceModelClass;

/**
 * Class Dummy
 * @package Ticaje\Dummy\Model
 */
class Dummy extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'dummy_table';

    protected function _construct()
    {
        $this->_init(ResourceModelClass::class);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
}
