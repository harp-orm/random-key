<?php

namespace Harp\RandomKey\Test;

/**
 * @coversDefaultClass Harp\RandomKey\RandomKeyTrait
 *
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class RandomKeyTest extends AbstractTestCase
{
    /**
     * @covers ::initialize
     */
    public function testConstruct()
    {
        $test = new Test();

        $this->assertNotNull($test->uniqueKey);

        Test::save($test);

        $test2 = new Test();

        $this->assertNotNull($test2->uniqueKey);

        $this->assertNotEquals($test->uniqueKey, $test2->uniqueKey);
    }

    /**
     * @covers ::newRandomKey
     */
    public function testNewRandomKey()
    {
        $key = Test::newRandomKey();

        $this->assertLessThan(100, strlen($key));
    }

    /**
     * @covers ::newRandomKeyUnique
     */
    public function testNewRandomKeyUnique()
    {
        Test2::$newRandomKey = ['new-key', 'existing-key', 'existing-key2', 'existing-key3', 'agian-key'];

        $this->assertEquals('new-key', Test2::newRandomKeyUnique());
        $this->assertEquals('agian-key', Test2::newRandomKeyUnique());
    }

}
