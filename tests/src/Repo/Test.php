<?php

namespace Harp\RandomKey\Test\Repo;

use Harp\Harp\AbstractRepo;
use Harp\RandomKey\Test\Model;
use Harp\RandomKey\Repo\RandomKeyTrait;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class Test extends AbstractRepo
{
    use RandomKeyTrait;

    /**
     * @return Test
     */
    public static function newInstance()
    {
        return new Test('Harp\RandomKey\Test\Model\Test');
    }

    public function initialize()
    {
        $this->initializeRandomKey();
    }
}
