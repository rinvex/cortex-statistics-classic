<?php

declare(strict_types=1);

namespace Cortex\Statistics\DataTables\Adminarea;

use Rinvex\Statistics\Models\Geoip;
use Illuminate\Database\Eloquent\Builder;
use Cortex\Foundation\DataTables\AbstractDataTable;
use Cortex\Statistics\Transformers\Adminarea\GeoipTransformer;

class GeoipsDataTable extends AbstractDataTable
{
    /**
     * {@inheritdoc}
     */
    protected $model = Geoip::class;

    /**
     * {@inheritdoc}
     */
    protected $transformer = GeoipTransformer::class;

    /**
     * {@inheritdoc}
     */
    protected $createButton = false;

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return datatables($this->query())
            ->setTransformer(app($this->transformer))
            ->filterColumn('country_code', function (Builder $builder, $keyword) {
                $countryCode = collect(countries())->search(function ($country) use ($keyword) {
                    return mb_strpos($country['name'], $keyword) !== false || mb_strpos($country['emoji'], $keyword) !== false;
                });

                ! $countryCode || $builder->where('country_code', $countryCode);
            })
            ->make(true);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            'client_ip' => ['title' => trans('cortex/statistics::common.client_ip'), 'responsivePriority' => 0],
            'latitude' => ['title' => trans('cortex/statistics::common.latitude')],
            'longitude' => ['title' => trans('cortex/statistics::common.longitude')],
            'country_code' => ['title' => trans('cortex/statistics::common.country_code'), 'render' => 'full.country_emoji+" "+data'],
            'client_ips' => ['title' => trans('cortex/statistics::common.client_ips'), 'visible' => false],
            'is_from_trusted_proxy' => ['title' => trans('cortex/statistics::common.is_from_trusted_proxy')],
            'division_code' => ['title' => trans('cortex/statistics::common.division_code')],
            'postal_code' => ['title' => trans('cortex/statistics::common.postal_code')],
            'timezone' => ['title' => trans('cortex/statistics::common.timezone')],
            'city' => ['title' => trans('cortex/statistics::common.city')],
            'count' => ['title' => trans('cortex/statistics::common.count')],
        ];
    }
}
