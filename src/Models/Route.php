<?php

declare(strict_types=1);

namespace Cortex\Statistics\Models;

use Rinvex\Support\Traits\HasTimezones;
use Rinvex\Statistics\Models\Route as BaseRoute;

class Route extends BaseRoute
{
    use HasTimezones;
}
