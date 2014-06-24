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

    public function initialize()
    {
        $this
            ->setModelClass('Harp\RandomKey\Test\Model\Test')
            ->setTable('Test')
            ->initializeRandomKey();
    }
}
