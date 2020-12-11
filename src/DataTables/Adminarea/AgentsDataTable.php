<?php

declare(strict_types=1);

namespace Cortex\Statistics\DataTables\Adminarea;

use Rinvex\Statistics\Models\Agent;
use Cortex\Foundation\DataTables\AbstractDataTable;
use Cortex\Statistics\Transformers\Adminarea\AgentTransformer;

class AgentsDataTable extends AbstractDataTable
{
    /**
     * {@inheritdoc}
     */
    protected $model = Agent::class;

    /**
     * {@inheritdoc}
     */
    protected $transformer = AgentTransformer::class;

    /**
     * Set action buttons.
     *
     * @var mixed
     */
    protected $buttons = [
        'create' => false,
        'import' => false,
        'create_popup' => false,

        'reset' => true,
        'reload' => true,
        'showSelected' => true,

        'export' => true,
        'print' => true,

        'bulkDelete' => false,
        'bulkActivate' => false,
        'bulkDeactivate' => false,
        'bulkRevoke' => false,

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
            'name' => ['title' => trans('cortex/statistics::common.name'), 'responsivePriority' => 0],
            'kind' => ['title' => trans('cortex/statistics::common.kind')],
            'family' => ['title' => trans('cortex/statistics::common.family')],
            'version' => ['title' => trans('cortex/statistics::common.version')],
            'count' => ['title' => trans('cortex/statistics::common.count')],
        ];
    }
}
