<?php

declare(strict_types=1);

namespace Cortex\Statistics\Models;

use Rinvex\Statistics\Models\Path as BasePath;

class Path extends BasePath
{
    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'host',
        'locale',
        'accessarea',
        'path',
        'method',
        'parameters',
    ];

    /**
     * {@inheritdoc}
     */
    protected $casts = [
        'host' => 'string',
        'locale' => 'string',
        'accessarea' => 'string',
        'path' => 'string',
        'method' => 'string',
        'parameters' => 'array',
    ];

    /**
     * The default rules that the model will validate against.
     *
     * @var array
     */
    protected $rules = [
        'host' => 'required|string',
        'locale' => 'required|string',
        'accessarea' => 'nullable|string',
        'path' => 'required|string',
        'method' => 'required|string',
        'parameters' => 'nullable|array',
    ];
}
