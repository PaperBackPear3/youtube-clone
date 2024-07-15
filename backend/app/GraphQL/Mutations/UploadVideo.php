<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

final readonly class UploadVideo
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        // TODO implement the resolver
        /** @var \Illuminate\Http\UploadedFile $file */
        $file = $args['file'];
        

        return $file->storePublicly('uploads');
    }
}
