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
 * Interface GeneralInterface
 * @package Ticaje\Dummy\Configuration
 * This interface inherits from Ticaje\Configuration\Setting\GeneralInterface because it makes room for creating
 * more configurations within uppermost general node, im our example it's dummy_config/general
 */
interface GeneralInterface
{
    const XML_GROUP_PATH = 'general';

    const DEBUG_MODE_FIELD = 'debug_mode';

    const ENABLED_FIELD = 'enabled';

    const PRODUCTION_ENVIRONMENT_FIELD = 'production_environment';
    /**
     * @param null $storeId
     * @return bool
     */
    public function inDebugMode($storeId = null): bool;

    /**
     * @param null $storeId
     * @return bool
     */
    public function isEnabled($storeId = null): bool;
}
