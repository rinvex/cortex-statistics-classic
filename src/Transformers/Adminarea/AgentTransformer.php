<?php

declare(strict_types=1);

namespace Cortex\Statistics\Transformers\Adminarea;

use Rinvex\Support\Traits\Escaper;
use Rinvex\Statistics\Models\Agent;
use League\Fractal\TransformerAbstract;

class AgentTransformer extends TransformerAbstract
{
    use Escaper;

    /**
     * Transform agent model.
     *
     * @param \Rinvex\Statistics\Models\Agent $agent
     *
     * @return array
     */
    public function transform(Agent $agent): array
    {
        return $this->escape([
            'name' => (string) $agent->name,
            'kind' => (string) $agent->kind,
            'family' => (string) $agent->family,
            'version' => (string) $agent->version,
            'count' => (int) $agent->count,
        ]);
    }
}
