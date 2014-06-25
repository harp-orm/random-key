<?php

namespace Harp\RandomKey;

use Harp\Core\Repo\Event;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
trait RandomKeyRepoTrait
{
    /**
     * @param int                   $event
     * @param \Closure|object|array $callback
     * @return string
     */
    abstract public function addEventBefore($event, $callback);

    public function newRandomKey()
    {
        return strtoupper(base_convert(rand(1, 10000000000), 10, 36));
    }

    /**
     * @return string
     */
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
        return $this
            ->addEventAfter(Event::CONSTRUCT, function ($model) {
                $model->uniqueKey = $model->uniqueKey ?: $this->newRandomKeyUnique();
            });
    }
}
