<?php
declare(strict_types=1);

/**
 * Configuration Interface
 * @category    Ticaje
 * @package     Ticaje_Dummy
 * @author      Hector Luis Barrientos <ticaje@filetea.me>
 */

namespace Ticaje\Dummy\Configuration;

use Ticaje\Configuration\Setting\ConfigInterface as ParentClass;

/**
 * Interface ConfigInterface
 * @package Ticaje\Dummy\Configuration
 */
interface ConfigInterface extends ParentClass
{
    const XML_BASE_PATH = 'dummy_config'; // Super parent section in config file
}
