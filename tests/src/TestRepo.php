<?php

namespace Harp\RandomKey\Test;

use Harp\Harp\AbstractRepo;
use Harp\RandomKey\RandomKeyRepoTrait;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class TestRepo extends AbstractRepo
{
    use RandomKeyRepoTrait;

    public function initialize()
    {
        $this
            ->setModelClass('Harp\RandomKey\Test\Test')
            ->setTable('Test')
            ->initializeRandomKey();
    }
}
