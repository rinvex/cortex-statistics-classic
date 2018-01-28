<?php

declare(strict_types=1);

namespace Cortex\Statistics\DataTables\Adminarea;

use Rinvex\Statistics\Models\Device;
use Cortex\Foundation\DataTables\AbstractDataTable;

class DevicesDataTable extends AbstractDataTable
{
    /**
     * {@inheritdoc}
     */
    protected $model = Device::class;

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
            'model' => ['title' => trans('cortex/statistics::common.model')],
            'brand' => ['title' => trans('cortex/statistics::common.brand')],
            'count' => ['title' => trans('cortex/statistics::common.count')],
        ];
    }
}
