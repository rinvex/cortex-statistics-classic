<?php

declare(strict_types=1);

namespace Cortex\Statistics\Models;

use Rinvex\Support\Traits\HasTimezones;
use Rinvex\Statistics\Models\Agent as BaseAgent;

class Agent extends BaseAgent
{
    use HasTimezones;
}
