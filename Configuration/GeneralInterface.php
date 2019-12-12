<?php
declare(strict_types=1);

/**
 * Configuration Interface
 * @category    Ticaje
 * @package     Ticaje_Dummy
 * @author      Hector Luis Barrientos <ticaje@filetea.me>
 */

namespace Ticaje\Dummy\Configuration;

use Ticaje\Configuration\Setting\GeneralInterface as ParentInterface;

/**
 * Interface GeneralInterface
 * @package Ticaje\Dummy\Configuration
 * This interface inherits from Ticaje\Configuration\Setting\GeneralInterface because it makes room for creating
 * more configurations within uppermost general node, im our example it's dummy_config/general
 */
interface GeneralInterface extends ParentInterface
{
    const DEBUG_MODE_FIELD = 'debug_mode'; // As an example we're hereby creating a config called debug mode. Look at system.xml file.

    /**
     * @param null $storeId
     * @return mixed
     */
    public function inDebugMode($storeId = null);
}
