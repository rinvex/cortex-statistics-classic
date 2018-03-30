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
            'family' => (string) $platform->family,
            'version' => (string) $platform->version,
            'count' => (int) $platform->count,
        ];
    }
}
