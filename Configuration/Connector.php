<?php
declare(strict_types=1);

/**
 * Config Class
 * @category    Ticaje
 * @package     Ticaje_Dummy
 * @author      Hector Luis Barrientos <ticaje@filetea.me>
 */

namespace Ticaje\Dummy\Configuration;

/**
 * Class Connector
 * @package Ticaje\Dummy\Configuration
 */
class Connector extends Base implements ConnectorInterface
{
    /**
     * @inheritDoc
     */
    public function getXmlGroupPath($storeId = null): string
    {
        return self::XML_GROUP_PATH;
    }

    /**
     * @inheritDoc
     */
    public function isProductionEnvironment($storeId = null): bool
    {
        return (bool)$this->getConfig(self::XML_SUB_GROUP_GENERAL_PATH . DIRECTORY_SEPARATOR . self::PRODUCTION_ENVIRONMENT_FIELD, $storeId);
    }

    /**
     * @inheritDoc
     */
    public function getBaseUri($storeId = null): string
    {
        return (string)$this->getConfig(self::XML_SUB_GROUP_GENERAL_PATH . DIRECTORY_SEPARATOR . self::BASE_URI_FIELD, $storeId);
    }
}
