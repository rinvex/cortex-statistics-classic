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
        'parameters' => 'json',
    ];

    /**
     * The default rules that the model will validate against.
     *
     * @var array
     */
    protected $rules = [
        'host' => 'required|string',
        'locale' => 'required|string',
        'accessarea' => 'required|string',
        'path' => 'required|string',
        'parameters' => 'nullable|array',
    ];
}
