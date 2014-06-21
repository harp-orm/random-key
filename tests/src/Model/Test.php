<?php

namespace Harp\RandomKey\Test\Model;

use Harp\Harp\AbstractModel;
use Harp\RandomKey\Test\Repo;
use Harp\RandomKey\Model\RandomKeyTrait;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class Test extends AbstractModel
{
    use RandomKeyTrait;

    /**
     * @return Repo\Test
     */
    public function getRepo()
    {
        return Repo\Test::get();
    }

    public $id;
}
