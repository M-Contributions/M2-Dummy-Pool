<?php
declare(strict_types=1);

/**
 * Base Configuration Class
 * @category    Ticaje
 * @package     Ticaje_AliexpressSettings
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\Dummy\Configuration;

/**
 * Class General
 * @package Ticaje\Dummy\Configuration
 */
class General extends Base implements GeneralInterface
{
    /**
     * @inheritDoc
     */
    protected function getLocalPath($configPath)
    {
        return self::XML_BASE_PATH . DIRECTORY_SEPARATOR . self::XML_GROUP_PATH . DIRECTORY_SEPARATOR . $configPath;
    }

    /**
     * @inheritDoc
     */
    public function isEnabled($storeId = null): bool
    {
        return (bool)$this->getConfig($this->getLocalPath(self::ENABLED_FIELD), $storeId);
    }

    /**
     * @inheritDoc
     */
    public function isProductionEnvironment($storeId = null): bool
    {
        return (bool)$this->getConfig($this->getLocalPath(self::PRODUCTION_ENVIRONMENT_FIELD), $storeId);
    }

    /**
     * @inheritDoc
     */
    public function inDebugMode($storeId = null):bool
    {
        return (bool)$this->getConfig($this->getLocalPath(self::DEBUG_MODE_FIELD), $storeId);
    }
}
