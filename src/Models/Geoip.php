<?php

declare(strict_types=1);

namespace Cortex\Statistics\Models;

use Rinvex\Support\Traits\HasTimezones;
use Rinvex\Statistics\Models\Geoip as BaseGeoip;

class Geoip extends BaseGeoip
{
    use HasTimezones;
}
