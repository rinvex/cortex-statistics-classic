<?php

declare(strict_types=1);

namespace Cortex\Statistics\Transformers\Adminarea;

use Rinvex\Support\Traits\Escaper;
use Rinvex\Statistics\Models\Geoip;
use League\Fractal\TransformerAbstract;

class GeoipTransformer extends TransformerAbstract
{
    use Escaper;

    /**
     * Transform geoip model.
     *
     * @param \Rinvex\Statistics\Models\Geoip $geoip
     *
     * @return array
     */
    public function transform(Geoip $geoip): array
    {
        $country = $geoip->country_code ? country($geoip->country_code) : null;

        return $this->escape([
            'client_ip' => (string) $geoip->client_ip,
            'latitude' => (string) $geoip->latitude,
            'longitude' => (string) $geoip->longitude,
            'country_code' => (string) optional($country)->getName(),
            'country_emoji' => (string) optional($country)->getEmoji(),
            'client_ips' => (string) $geoip->client_ips,
            'is_from_trusted_proxy' => (bool) $geoip->is_from_trusted_proxy,
            'division_code' => (string) $geoip->division_code,
            'postal_code' => (string) $geoip->postal_code,
            'timezone' => (string) $geoip->timezone,
            'city' => (string) $geoip->city,
            'count' => (int) $geoip->count,
        ]);
    }
}
