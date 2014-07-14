<?php

namespace Harp\RandomKey;

use Harp\Harp\Config;
use Harp\Harp\Repo\Event;

/**
 * @author    Ivan Kerin <ikerin@gmail.com>
 * @copyright 2014, Clippings Ltd.
 * @license   http://spdx.org/licenses/BSD-3-Clause
 */
trait RandomKeyTrait
{
    public static function newRandomKey()
    {
        return strtoupper(base_convert(rand(1, 10000000000), 10, 36));
    }

    /**
     * @return string
     */
    public static function newRandomKeyUnique()
    {
        do {
            $uniqueKey = static::newRandomKey();
            $existingCount = static::where('uniqueKey', $uniqueKey)->loadCount();
        } while ($existingCount > 0);

        return $uniqueKey;
    }

    public static function initialize(Config $config)
    {
        $config
            ->addEventAfter(Event::CONSTRUCT, function ($model) {
                $class = get_class($model);
                $model->uniqueKey = $model->uniqueKey ?: $class::newRandomKeyUnique();
            });
    }

    public $uniqueKey;
}
