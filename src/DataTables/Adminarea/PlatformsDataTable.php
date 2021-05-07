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
        'bulkDelete' => false,
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
            'version' => ['title' => trans('cortex/statistics::common.version')],
            'count' => ['title' => trans('cortex/statistics::common.count')],
        ];
    }
}
