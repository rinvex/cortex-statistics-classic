<?php

declare(strict_types=1);

namespace Cortex\Statistics\Transformers\Adminarea;

use League\Fractal\TransformerAbstract;
use Rinvex\Statistics\Contracts\PlatformContract;

class PlatformTransformer extends TransformerAbstract
{
    /**
     * @return array
     */
    public function transform(PlatformContract $platform): array
    {
        return [
            'id' => (int) $platform->getKey(),
            'family' => (string) $platform->family,
            'version' => (string) $platform->version,
            'count' => (string) $platform->count,
        ];
    }
}
