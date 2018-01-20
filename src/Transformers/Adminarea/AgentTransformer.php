<?php

declare(strict_types=1);

namespace Cortex\Statistics\Transformers\Adminarea;

use League\Fractal\TransformerAbstract;
use Rinvex\Statistics\Contracts\AgentContract;

class AgentTransformer extends TransformerAbstract
{
    /**
     * @return array
     */
    public function transform(AgentContract $agent): array
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
