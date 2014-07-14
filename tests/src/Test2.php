<?php

namespace Harp\RandomKey\Test;

use Harp\Harp\AbstractModel;
use Harp\RandomKey\RandomKeyTrait;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class Test2 extends AbstractModel
{
    use RandomKeyTrait;

    public static function initialize($config)
    {
        RandomKeyTrait::initialize($config);
    }

    public static $newRandomKey = array();

    public static function newRandomKey()
    {
        $key = current(static::$newRandomKey);
        next(static::$newRandomKey);
        return $key;
    }

    public $id;
}
