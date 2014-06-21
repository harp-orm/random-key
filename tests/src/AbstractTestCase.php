<?php

namespace Harp\RandomKey\Test;

use Harp\Query\DB;
use PHPUnit_Framework_TestCase;
use Harp\RandomKey\Test\Repo;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
abstract class AbstractTestCase extends PHPUnit_Framework_TestCase {

    public function setUp()
    {
        parent::setUp();

        DB::setConfig('default', array(
            'dsn' => 'mysql:dbname=harp-orm/random-key;host=127.0.0.1',
            'username' => 'root',
        ));

        DB::get()->beginTransaction();

        Repo\Test::get()->clear();
    }

    public function tearDown()
    {
        DB::get()->rollback();

        parent::tearDown();
    }
}
