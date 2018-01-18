<?php

declare(strict_types=1);

namespace Cortex\Statistics\Transformers\Adminarea;

use League\Fractal\TransformerAbstract;
use Rinvex\Statistics\Contracts\PathContract;

class PathTransformer extends TransformerAbstract
{
    /**
     * @return array
     */
    public function transform(PathContract $path)
    {
        return [
            'id' => (int) $path->getKey(),
            'host' => (string) $path->host,
            'locale' => (string) $path->locale,
            'accessarea' => (string) $path->accessarea,
            'path' => (string) $path->path,
            'parameters' => (string) implode(',', $path->parameters),
            'count' => (string) $path->count,
        ];
    }
}
