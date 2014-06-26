Random Key
==========

[![Build Status](https://travis-ci.org/harp-orm/random-key.png?branch=master)](https://travis-ci.org/harp-orm/random-key)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/harp-orm/random-key/badges/quality-score.png)](https://scrutinizer-ci.com/g/harp-orm/random-key/)
[![Code Coverage](https://scrutinizer-ci.com/g/harp-orm/random-key/badges/coverage.png)](https://scrutinizer-ci.com/g/harp-orm/random-key/)
[![Latest Stable Version](https://poser.pugx.org/harp-orm/random-key/v/stable.png)](https://packagist.org/packages/harp-orm/random-key)

Generate a random unique key for a model property

Usage
-----

```
// Model Class
use Harp\Harp\AbstractModel
use Harp\RandomKey\RandomKeyTrat

class User extends AbstractModel
{
    use RandomKeyTrat;
}

// Repo Class
use Harp\Harp\AbstractRepo
use Harp\RandomKey\RandomKeyRepoTrat

class UserRepo extends AbstractRepo
{
    use RandomKeyRepoTrat;

    public function initialize()
    {
        // ...
        $this->initializeRandmoKey();
    }
}
```

__Database Table:__

```
┌─────────────────────────┐
│ Table: User             │
├─────────────┬───────────┤
│ id          │ ingeter   │
│ name        │ string    │
│ uniqueKey*  │ string    │
└─────────────┴───────────┘
* Required fields
```

License
-------

Copyright (c) 2014, Clippings Ltd. Developed by Ivan Kerin

Under BSD-3-Clause license, read LICENSE file.
