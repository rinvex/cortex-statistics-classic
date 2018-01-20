<?php

declare(strict_types=1);

namespace Cortex\Statistics\DataTables\Adminarea;

use Rinvex\Statistics\Models\Geoip;
use Cortex\Foundation\DataTables\AbstractDataTable;
use Cortex\Statistics\Transformers\Adminarea\AgentTransformer;

class GeoipsDataTable extends AbstractDataTable
{
    /**
     * {@inheritdoc}
     */
    protected $model = Geoip::class;

    /**
     * {@inheritdoc}
     */
    protected $transformer = AgentTransformer::class;

    /**
     * Get default builder parameters.
     *
     * @return array
     */
    protected function getBuilderParameters(): array
    {
        return [
            'keys' => true,
            'retrieve' => true,
            'autoWidth' => false,
            'dom' => "<'row'<'col-sm-6'B><'col-sm-6'f>> <'row'r><'row'<'col-sm-12't>> <'row'<'col-sm-5'i><'col-sm-7'p>>",
            'buttons' => [
                'print', 'reset', 'reload', 'export',
                ['extend' => 'colvis', 'text' => '<i class="fa fa-columns"></i> '.trans('cortex/foundation::common.columns').' <span class="caret"/>'],
                ['extend' => 'pageLength', 'text' => '<i class="fa fa-list-ol"></i> '.trans('cortex/foundation::common.limit').' <span class="caret"/>'],
            ],
        ];
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
            'country_code' => ['title' => trans('cortex/statistics::common.country_code')],
            'client_ips' => ['title' => trans('cortex/statistics::common.client_ips')],
            'is_from_trusted_proxy' => ['title' => trans('cortex/statistics::common.is_from_trusted_proxy')],
            'division_code' => ['title' => trans('cortex/statistics::common.division_code')],
            'postal_code' => ['title' => trans('cortex/statistics::common.postal_code')],
            'timezone' => ['title' => trans('cortex/statistics::common.timezone')],
            'city' => ['title' => trans('cortex/statistics::common.city')],
            'count' => ['title' => trans('cortex/statistics::common.count')],
        ];
    }
}
