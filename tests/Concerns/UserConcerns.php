<?php
namespace Tests\Concerns;

use App\Models\User;

trait UserConcerns
{
    public function createUser(array $attributes = []): User
    {
        return User::factory()->create($attributes);
    }

    public function createAdmin(array $attributes = []): User
    {
        return User::factory()->create([
                'is_admin' => true,
            ] + $attributes);
    }
}
