<?php

declare(strict_types=1);

namespace Cortex\Statistics\DataTables\Adminarea;

use Rinvex\Statistics\Models\Path;
use Cortex\Foundation\DataTables\AbstractDataTable;
use Cortex\Statistics\Transformers\Adminarea\PathTransformer;

class PathsDataTable extends AbstractDataTable
{
    /**
     * {@inheritdoc}
     */
    protected $model = Path::class;

    /**
     * {@inheritdoc}
     */
    protected $transformer = PathTransformer::class;

    /**
     * Set action buttons.
     *
     * @var mixed
     */
    protected $buttons = [
        'create' => false,
        'import' => false,

        'reset' => true,
        'reload' => true,
        'showSelected' => true,

        'print' => true,
        'export' => true,

        'bulkDelete' => false,
        'bulkActivate' => false,
        'bulkDeactivate' => false,

        'colvis' => true,
        'pageLength' => true,
    ];

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            'id' => ['checkboxes' => '{"selectRow": true}', 'exportable' => false, 'printable' => false],
            'host' => ['title' => trans('cortex/statistics::common.host'), 'responsivePriority' => 0],
            'locale' => ['title' => trans('cortex/statistics::common.locale')],
            'accessarea' => ['title' => trans('cortex/statistics::common.accessarea')],
            'path' => ['title' => trans('cortex/statistics::common.path')],
            'parameters' => ['title' => trans('cortex/statistics::common.parameters'), 'render' => 'data ? JSON.stringify(data) : ""'],
            'count' => ['title' => trans('cortex/statistics::common.count')],
        ];
    }
}
