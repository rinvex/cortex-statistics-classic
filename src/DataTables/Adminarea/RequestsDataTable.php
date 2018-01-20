<?php

declare(strict_types=1);

namespace Cortex\Statistics\DataTables\Adminarea;

use Rinvex\Statistics\Contracts\RequestContract;
use Cortex\Foundation\DataTables\AbstractDataTable;
use Cortex\Statistics\Transformers\Adminarea\RequestTransformer;

class RequestsDataTable extends AbstractDataTable
{
    /**
     * {@inheritdoc}
     */
    protected $model = RequestContract::class;

    /**
     * {@inheritdoc}
     */
    protected $transformer = RequestTransformer::class;

    /**
     * Get default builder parameters.
     *
     * @return array
     */
    protected function getBuilderParameters(): array
    {
        return [
            'keys' => true,
            'retrieve' => true,
            'autoWidth' => false,
            'dom' => "<'row'<'col-sm-6'B><'col-sm-6'f>> <'row'r><'row'<'col-sm-12't>> <'row'<'col-sm-5'i><'col-sm-7'p>>",
            'buttons' => [
                'print', 'reset', 'reload', 'export',
                ['extend' => 'colvis', 'text' => '<i class="fa fa-columns"></i> '.trans('cortex/foundation::common.columns').' <span class="caret"/>'],
                ['extend' => 'pageLength', 'text' => '<i class="fa fa-list-ol"></i> '.trans('cortex/foundation::common.limit').' <span class="caret"/>'],
            ],
        ];
    }

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
            'created_at' => ['title' => trans('cortex/statistics::common.created_at'), 'render' => "moment(data).format('MMM Do, YYYY')"],
        ];
    }
}
