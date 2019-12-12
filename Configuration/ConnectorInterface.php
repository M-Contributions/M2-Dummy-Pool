<?php
declare(strict_types=1);

/**
 * Configuration Interface
 * @category    Ticaje
 * @package     Ticaje_Dummy
 * @author      Hector Luis Barrientos <ticaje@filetea.me>
 */

namespace Ticaje\Dummy\Configuration;

/**
 * Interface ApiInterface
 * @package Ticaje\Dummy\Configuration
 * This class is responsible for housing all configurations within connector section
 */
interface ConnectorInterface extends ConfigInterface
{
    const XML_GROUP_PATH = 'connector';

    const XML_SUB_GROUP_GENERAL_PATH = 'general'; // This is general section within connector section

    const PRODUCTION_ENVIRONMENT_FIELD = 'production_environment';

    const BASE_URI_FIELD = 'base_uri';

    /**
     * @param null $storeId
     * @return bool
     * This method is specific of this contract
     */
    public function isProductionEnvironment($storeId = null): bool;

    /**
     * @param null $storeId
     * @return string
     * This method is specific of this contract
     */
    public function getBaseUri($storeId = null): string;
}
