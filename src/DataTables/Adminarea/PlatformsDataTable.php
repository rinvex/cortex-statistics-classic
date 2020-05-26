<?php

declare(strict_types=1);

namespace Cortex\Statistics\DataTables\Adminarea;

use Rinvex\Statistics\Models\Platform;
use Cortex\Foundation\DataTables\AbstractDataTable;
use Cortex\Statistics\Transformers\Adminarea\PlatformTransformer;

class PlatformsDataTable extends AbstractDataTable
{
    /**
     * {@inheritdoc}
     */
    protected $model = Platform::class;

    /**
     * {@inheritdoc}
     */
    protected $transformer = PlatformTransformer::class;

    /**
     * Set action buttons.
     *
     * @var mixed
     */
    protected $buttons = [
        'create' => false,
        'import' => false,

        'export' => true,
        'print' => true,
        'showSelected' => true,

        'reset' => true,
        'reload' => true,

        'bulkDelete' => true,
        'bulkEnable' => false,
        'bulkDisable' => false,

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
            'family' => ['title' => trans('cortex/statistics::common.family'), 'responsivePriority' => 0],
            'version' => ['title' => trans('cortex/statistics::common.version')],
            'count' => ['title' => trans('cortex/statistics::common.count')],
        ];
    }
}
