<?php

namespace Harp\RandomKey\Repo;

use Harp\Core\Repo\Event;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
trait RandomKeyTrait
{
    /**
     * @param int                   $event
     * @param \Closure|object|array $callback
     */
    abstract public function addEventBefore($event, $callback);

    public function newRandomKey()
    {
        return strtoupper(base_convert(rand(1, 10000000000), 10, 36));
    }

    public function newRandomKeyUnique()
    {
        do {
            $uniqueKey = $this->newRandomKey();
            $existingCount = $this->findAll()->where('uniqueKey', $uniqueKey)->loadCount();
        } while ($existingCount > 0);

        return $uniqueKey;
    }

    public function initializeRandomKey()
    {
        $this
            ->addEventAfter(Event::CONSTRUCT, function ($model) {
                $model->uniqueKey = $model->uniqueKey ?: $this->newRandomKeyUnique();
            });
    }
}