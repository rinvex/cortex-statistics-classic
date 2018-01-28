<?php

declare(strict_types=1);

namespace Cortex\Statistics\DataTables\Adminarea;

use Rinvex\Statistics\Models\Platform;
use Cortex\Foundation\DataTables\AbstractDataTable;

class PlatformsDataTable extends AbstractDataTable
{
    /**
     * {@inheritdoc}
     */
    protected $model = Platform::class;

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
            'family' => ['title' => trans('cortex/statistics::common.family'), 'responsivePriority' => 0],
            'version' => ['title' => trans('cortex/statistics::common.version')],
            'count' => ['title' => trans('cortex/statistics::common.count')],
        ];
    }
}
