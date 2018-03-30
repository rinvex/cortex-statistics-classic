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
            'host' => (string) $path->host,
            'locale' => (string) $path->locale,
            'accessarea' => (string) $path->accessarea,
            'path' => (string) $path->path,
            'parameters' => (string) $path->parameters,
            'count' => (int) $path->count,
        ];
    }
}
