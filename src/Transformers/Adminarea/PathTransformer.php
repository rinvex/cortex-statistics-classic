<?php

declare(strict_types=1);

namespace Cortex\Statistics\Transformers\Adminarea;

use Rinvex\Statistics\Models\Path;
use League\Fractal\TransformerAbstract;

class PathTransformer extends TransformerAbstract
{
    /**
     * @return array
     */
    public function transform(Path $path): array
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
