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
abstract class Base extends ParentClass implements ConfigInterface
{
    /**
     * @param $configPath
     * @return mixed
     */
    abstract protected function getLocalPath($configPath);
}
