<?php
declare(strict_types=1);

/**
 * Base Configuration Class
 * @category    Ticaje
 * @package     Ticaje_Dummy
 * @author      Hector Luis Barrientos <ticaje@filetea.me>
 */

namespace Ticaje\Dummy\Configuration;

use Ticaje\Configuration\Setting\Base as ParentClass;

/**
 * Class Base
 * @package Ticaje\Dummy\Configuration
 */
abstract class Base extends ParentClass implements GeneralInterface
{
    protected $xmlBasePath = ConfigInterface::XML_BASE_PATH;

    protected $generalPath = GeneralInterface::XML_FIELD_GENERAL; // This is general section

    /**
     * @param null $storeId
     * @return mixed|string
     */
    public function inDebugMode($storeId = null)
    {
        return $this->getGeneralConfig(self::DEBUG_MODE_FIELD, $storeId);
    }
}
