<?php

declare(strict_types=1);

namespace Cortex\Statistics\Models;

use Rinvex\Support\Traits\HasTimezones;
use Rinvex\Statistics\Models\Device as BaseDevice;

class Device extends BaseDevice
{
    use HasTimezones;
}
