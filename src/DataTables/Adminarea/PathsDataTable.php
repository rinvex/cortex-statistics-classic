<?php

declare(strict_types=1);

namespace Cortex\Statistics\DataTables\Adminarea;

use Rinvex\Statistics\Contracts\PathContract;
use Cortex\Foundation\DataTables\AbstractDataTable;
use Cortex\Statistics\Transformers\Adminarea\PathTransformer;

class PathsDataTable extends AbstractDataTable
{
    /**
     * {@inheritdoc}
     */
    protected $model = PathContract::class;

    /**
     * {@inheritdoc}
     */
    protected $transformer = PathTransformer::class;

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
            'host' => ['title' => trans('cortex/statistics::common.host'), 'responsivePriority' => 0],
            'locale' => ['title' => trans('cortex/statistics::common.locale')],
            'accessarea' => ['title' => trans('cortex/statistics::common.accessarea')],
            'path' => ['title' => trans('cortex/statistics::common.path')],
            'parameters' => ['title' => trans('cortex/statistics::common.parameters')],
            'count' => ['title' => trans('cortex/statistics::common.count')],
        ];
    }
}
