<?php

namespace Harp\RandomKey\Test;

/**
 * @coversDefaultClass Harp\RandomKey\RandomKeyRepoTrait
 *
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
class RandomKeyTest extends AbstractTestCase
{
    /**
     * @covers ::initializeRandomKey
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
        $key = TestRepo::get()->newRandomKey();

        $this->assertLessThan(100, strlen($key));
    }

    /**
     * @covers ::newRandomKeyUnique
     */
    public function testNewRandomKeyUnique()
    {
        $repo = $this->getMock(__NAMESPACE__.'\TestRepo', ['newRandomKey']);

        $repo
            ->expects($this->exactly(5))
            ->method('newRandomKey')
            ->will($this->onConsecutiveCalls('new-key', 'existing-key', 'existing-key2', 'existing-key3', 'agian-key'));

        $this->assertEquals('new-key', $repo->newRandomKeyUnique());
        $this->assertEquals('agian-key', $repo->newRandomKeyUnique());
    }

}
