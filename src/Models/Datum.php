<?php

declare(strict_types=1);

namespace Cortex\Statistics\Models;

use Rinvex\Support\Traits\HasTimezones;
use Rinvex\Statistics\Models\Datum as BaseDatum;

class Datum extends BaseDatum
{
    use HasTimezones;
}
