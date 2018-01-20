<?php

declare(strict_types=1);

namespace Cortex\Statistics\Transformers\Adminarea;

use League\Fractal\TransformerAbstract;
use Rinvex\Statistics\Contracts\DeviceContract;

class DeviceTransformer extends TransformerAbstract
{
    /**
     * @return array
     */
    public function transform(DeviceContract $device): array
    {
        return [
            'id' => (int) $device->getKey(),
            'family' => (string) $device->family,
            'model' => (string) $device->model,
            'brand' => (string) $device->brand,
            'count' => (int) $device->count,
        ];
    }
}
