<?php

declare(strict_types=1);

namespace Cortex\Statistics\Transformers\Adminarea;

use Rinvex\Support\Traits\Escaper;
use Rinvex\Statistics\Models\Platform;
use League\Fractal\TransformerAbstract;

class PlatformTransformer extends TransformerAbstract
{
    use Escaper;

    /**
     * @return array
     */
    public function transform(Platform $platform): array
    {
        return $this->escape([
            'family' => (string) $platform->family,
            'version' => (string) $platform->version,
            'count' => (int) $platform->count,
        ]);
    }
}
