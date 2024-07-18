<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Video;
use Illuminate\Support\Facades\DB;

final readonly class SearchVideos
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $data = Video::query()
            ->select('*')
            ->selectRaw('MATCH(title, description) AGAINST(? IN BOOLEAN MODE) as score', [$args['query']])
            ->whereRaw('MATCH(title, description) AGAINST(? IN BOOLEAN MODE)', [$args['query']])
            ->orderByDesc('score')
            ->get();
        return $data;
    }
}
