<?php

declare(strict_types=1);

namespace Cortex\Statistics\Transformers\Adminarea;

use Rinvex\Statistics\Models\Platform;
use League\Fractal\TransformerAbstract;

class PlatformTransformer extends TransformerAbstract
{
    /**
     * @return array
     */
    public function transform(Platform $platform): array
    {
        return [
            'id' => (int) $platform->getKey(),
            'family' => (string) $platform->family,
            'version' => (string) $platform->version,
            'count' => (string) $platform->count,
        ];
    }
}
