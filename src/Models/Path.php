<?php

declare(strict_types=1);

namespace Cortex\Statistics\Models;

use Rinvex\Statistics\Models\Path as BasePath;

class Path extends BasePath
{
    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->mergeFillable(['accessarea']);

        $this->mergeCasts(['accessarea' => 'string']);

        $this->mergeRules(['accessarea' => 'nullable|string']);
    }
}
