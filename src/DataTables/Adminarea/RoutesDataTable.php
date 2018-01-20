<?php

declare(strict_types=1);

namespace Cortex\Statistics\DataTables\Adminarea;

use Rinvex\Statistics\Contracts\RouteContract;
use Cortex\Foundation\DataTables\AbstractDataTable;
use Cortex\Statistics\Transformers\Adminarea\RouteTransformer;

class RoutesDataTable extends AbstractDataTable
{
    /**
     * {@inheritdoc}
     */
    protected $model = RouteContract::class;

    /**
     * {@inheritdoc}
     */
    protected $transformer = RouteTransformer::class;

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
            'name' => ['title' => trans('cortex/statistics::common.name'), 'responsivePriority' => 0],
            'path' => ['title' => trans('cortex/statistics::common.path')],
            'action' => ['title' => trans('cortex/statistics::common.action')],
            'middleware' => ['title' => trans('cortex/statistics::common.middleware')],
            'parameters' => ['title' => trans('cortex/statistics::common.parameters')],
            'count' => ['title' => trans('cortex/statistics::common.count')],
        ];
    }
}
