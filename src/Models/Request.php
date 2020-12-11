<?php

declare(strict_types=1);

namespace Cortex\Statistics\Models;

use Rinvex\Support\Traits\HasTimezones;
use Rinvex\Statistics\Models\Request as BaseRequest;

class Request extends BaseRequest
{
    use HasTimezones;
}
