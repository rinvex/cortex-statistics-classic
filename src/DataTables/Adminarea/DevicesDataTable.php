<?php

declare(strict_types=1);

namespace Cortex\Statistics\DataTables\Adminarea;

use Rinvex\Statistics\Models\Device;
use Cortex\Foundation\DataTables\AbstractDataTable;
use Cortex\Statistics\Transformers\Adminarea\DeviceTransformer;

class DevicesDataTable extends AbstractDataTable
{
    /**
     * {@inheritdoc}
     */
    protected $model = Device::class;

    /**
     * {@inheritdoc}
     */
    protected $transformer = DeviceTransformer::class;

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
            'family' => ['title' => trans('cortex/statistics::common.family'), 'responsivePriority' => 0],
            'model' => ['title' => trans('cortex/statistics::common.model')],
            'brand' => ['title' => trans('cortex/statistics::common.brand')],
            'count' => ['title' => trans('cortex/statistics::common.count')],
        ];
    }
}
