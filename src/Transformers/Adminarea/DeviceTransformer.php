<?php

declare(strict_types=1);

namespace Cortex\Statistics\Transformers\Adminarea;

use Rinvex\Support\Traits\Escaper;
use Rinvex\Statistics\Models\Device;
use League\Fractal\TransformerAbstract;

class DeviceTransformer extends TransformerAbstract
{
    use Escaper;

    /**
     * @return array
     */
    public function transform(Device $device): array
    {
        return $this->escapeRow([
            'family' => (string) $device->family,
            'model' => (string) $device->model,
            'brand' => (string) $device->brand,
            'count' => (int) $device->count,
        ]);
    }
}
