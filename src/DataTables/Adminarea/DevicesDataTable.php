<?php

declare(strict_types=1);

namespace Cortex\Statistics\DataTables\Adminarea;

use Rinvex\Statistics\Contracts\DeviceContract;
use Cortex\Foundation\DataTables\AbstractDataTable;
use Cortex\Statistics\Transformers\Adminarea\DeviceTransformer;

class DevicesDataTable extends AbstractDataTable
{
    /**
     * {@inheritdoc}
     */
    protected $model = DeviceContract::class;

    /**
     * {@inheritdoc}
     */
    protected $transformer = DeviceTransformer::class;

    /**
     * Get default builder parameters.
     *
     * @return array
     */
    protected function getBuilderParameters()
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
    protected function getColumns()
    {
        return [
            'family' => ['title' => trans('cortex/statistics::common.family'), 'responsivePriority' => 0],
            'model' => ['title' => trans('cortex/statistics::common.model')],
            'brand' => ['title' => trans('cortex/statistics::common.brand')],
            'count' => ['title' => trans('cortex/statistics::common.count')],
        ];
    }
}
