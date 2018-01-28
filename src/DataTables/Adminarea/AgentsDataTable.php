<?php

declare(strict_types=1);

namespace Cortex\Statistics\DataTables\Adminarea;

use Rinvex\Statistics\Models\Agent;
use Cortex\Foundation\DataTables\AbstractDataTable;

class AgentsDataTable extends AbstractDataTable
{
    /**
     * {@inheritdoc}
     */
    protected $model = Agent::class;

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
            'name' => ['title' => trans('cortex/statistics::common.name'), 'responsivePriority' => 0],
            'kind' => ['title' => trans('cortex/statistics::common.kind')],
            'family' => ['title' => trans('cortex/statistics::common.family')],
            'version' => ['title' => trans('cortex/statistics::common.version')],
            'count' => ['title' => trans('cortex/statistics::common.count')],
        ];
    }
}
