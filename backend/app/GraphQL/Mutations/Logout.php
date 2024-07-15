<?php declare(strict_types=1);

namespace App\GraphQL\Mutations;

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
        $guard = ?;

        $user = $guard->user();
        $guard->logout();

        return $user;
    }
}
