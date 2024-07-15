<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

final readonly class Logout
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args): ?User
    {
        // Plain Laravel: Auth::guard()
        // Laravel Sanctum: Auth::guard(Arr::first(config('sanctum.guard', 'web')))
        $guard =  Auth::guard(Arr::first(config('sanctum.guard', 'web')));

        $user = $guard->user();
        $guard->logout();

        return $user;
    }
}
