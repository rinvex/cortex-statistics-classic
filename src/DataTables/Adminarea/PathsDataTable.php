<?php

declare(strict_types=1);

namespace Cortex\Statistics\DataTables\Adminarea;

use Rinvex\Statistics\Models\Path;
use Cortex\Foundation\DataTables\AbstractDataTable;

class PathsDataTable extends AbstractDataTable
{
    /**
     * {@inheritdoc}
     */
    protected $model = Path::class;

    /**
     * {@inheritdoc}
     */
    protected $createButton = false;

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
            'parameters' => ['title' => trans('cortex/statistics::common.parameters'), 'render' => 'data ? JSON.stringify(data) : ""'],
            'count' => ['title' => trans('cortex/statistics::common.count')],
        ];
    }
}
