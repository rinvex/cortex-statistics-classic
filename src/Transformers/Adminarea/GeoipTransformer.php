<?php

declare(strict_types=1);

namespace Cortex\Statistics\Transformers\Adminarea;

use League\Fractal\TransformerAbstract;
use Rinvex\Statistics\Contracts\GeoipContract;

class GeoipTransformer extends TransformerAbstract
{
    /**
     * @return array
     */
    public function transform(GeoipContract $geoip)
    {
        return [
            'id' => (int) $geoip->getKey(),
            'client_ip' => (string) $geoip->client_ip,
            'latitude' => (int) $geoip->latitude,
            'longitude' => (int) $geoip->longitude,
            'country_code' => (string) $geoip->country_code,
            'client_ips' => (string) implode(',', $geoip->client_ips),
            'is_from_trusted_proxy' => (bool) $geoip->is_from_trusted_proxy,
            'division_code' => (string) $geoip->division_code,
            'postal_code' => (string) $geoip->postal_code,
            'timezone' => (string) $geoip->timezone,
            'city' => (string) $geoip->city,
            'count' => (int) $geoip->count,
        ];
    }
}
