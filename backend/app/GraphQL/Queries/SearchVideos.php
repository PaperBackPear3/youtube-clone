<?php

declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Video;

final readonly class SearchVideos
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $a = $args;
        $data= Video::query()
            ->whereFullText(['title', 'description'], $args['query'])
            ->toSql();
        return $data->get();
    }
}
