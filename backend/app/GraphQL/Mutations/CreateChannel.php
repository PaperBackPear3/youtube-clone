<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Models\Channel;

final readonly class CreateChannel
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $user = auth()->user();

        $channel = new Channel();
        $channel->user_id = $user->id ?? rand(1, 10);
        $channel->name = $args['name'];
        $channel->description = $args['description'];
        $channel->save();
    }
}
