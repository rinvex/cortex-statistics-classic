<?php

declare(strict_types=1);

namespace Cortex\Statistics\Transformers\Adminarea;

use Rinvex\Statistics\Models\Agent;
use League\Fractal\TransformerAbstract;

class AgentTransformer extends TransformerAbstract
{
    /**
     * @return array
     */
    public function transform(Agent $agent): array
    {
        return [
            'id' => (int) $agent->getKey(),
            'name' => (string) $agent->name,
            'kind' => (string) $agent->kind,
            'family' => (string) $agent->family,
            'version' => (string) $agent->version,
            'count' => (int) $agent->count,
        ];
    }
}
