<?php

declare(strict_types=1);

namespace Cortex\Statistics\DataTables\Adminarea;

use Rinvex\Statistics\Models\Request;
use Cortex\Foundation\DataTables\AbstractDataTable;
use Cortex\Statistics\Transformers\Adminarea\RequestTransformer;

class RequestsDataTable extends AbstractDataTable
{
    /**
     * {@inheritdoc}
     */
    protected $model = Request::class;

    /**
     * {@inheritdoc}
     */
    protected $transformer = RequestTransformer::class;

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
            'user' => ['title' => trans('cortex/statistics::common.user'), 'responsivePriority' => 0],
            'session_id' => ['title' => trans('cortex/statistics::common.session_id')],
            'status_code' => ['title' => trans('cortex/statistics::common.status_code')],
            'method' => ['title' => trans('cortex/statistics::common.method')],
            'protocol_version' => ['title' => trans('cortex/statistics::common.protocol_version')],
            'referer' => ['title' => trans('cortex/statistics::common.referer')],
            'language' => ['title' => trans('cortex/statistics::common.language')],
            'is_no_cache' => ['title' => trans('cortex/statistics::common.is_no_cache'), 'visible' => false],
            'wants_json' => ['title' => trans('cortex/statistics::common.wants_json'), 'visible' => false],
            'is_secure' => ['title' => trans('cortex/statistics::common.is_secure'), 'visible' => false],
            'is_json' => ['title' => trans('cortex/statistics::common.is_json'), 'visible' => false],
            'is_ajax' => ['title' => trans('cortex/statistics::common.is_ajax'), 'visible' => false],
            'is_pjax' => ['title' => trans('cortex/statistics::common.is_pjax'), 'visible' => false],
            'created_at' => ['title' => trans('cortex/statistics::common.created_at'), 'render' => "moment(data).format('YYYY-MM-DD, hh:mm:ss A')"],
        ];
    }
}
