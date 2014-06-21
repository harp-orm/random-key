Random Key
==========

[![Build Status](https://travis-ci.org/harp-orm/random-key.png?branch=master)](https://travis-ci.org/harp-orm/random-key)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/harp-orm/random-key/badges/quality-score.png)](https://scrutinizer-ci.com/g/harp-orm/random-key/)
[![Code Coverage](https://scrutinizer-ci.com/g/harp-orm/random-key/badges/coverage.png)](https://scrutinizer-ci.com/g/harp-orm/random-key/)
[![Latest Stable Version](https://poser.pugx.org/harp-orm/random-key/v/stable.png)](https://packagist.org/packages/harp-orm/random-key)

Generate a random key for a model property

Usage
-----

```
use Harp\Harp\AbstractModel
use Harp\RandomKey\Model\RandomKeyTrat

class User extends AbstractModel
{
    use RandomKeyTrat;
}

//--------

use Harp\Harp\AbstractRepo
use Harp\RandomKey\Repo\RandomKeyTrat

class User extends AbstractRepo
{
    use RandomKeyTrat;

    public function initialize()
    {
        // ...
        $this->initializeRandmoKey();
    }
}

```

Now you'll have a "uniqueKey" property on your model, that will be pre-populated for each new object.

License
-------

Copyright (c) 2014, Clippings Ltd. Developed by Ivan Kerin

Under BSD-3-Clause license, read LICENSE file.
