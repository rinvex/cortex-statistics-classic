<?php

declare(strict_types=1);

namespace Cortex\Statistics\Transformers\Adminarea;

use Rinvex\Statistics\Models\Route;
use League\Fractal\TransformerAbstract;

class RouteTransformer extends TransformerAbstract
{
    /**
     * @return array
     */
    public function transform(Route $route): array
    {
        return [
            'id' => (int) $route->getKey(),
            'name' => (string) $route->name,
            'path' => (string) $route->path,
            'action' => (string) $route->action,
            'middleware' => (string) implode(',', $route->middleware),
            'parameters' => (string) implode(',', $route->parameters),
            'count' => (int) $route->count,
        ];
    }
}
