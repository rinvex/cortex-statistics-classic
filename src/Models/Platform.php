<?php

declare(strict_types=1);

namespace Cortex\Statistics\Models;

use Rinvex\Support\Traits\HasTimezones;
use Rinvex\Statistics\Models\Platform as BasePlatform;

class Platform extends BasePlatform
{
    use HasTimezones;
}
