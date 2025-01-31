<?php

namespace Tests\Traits;

use App\Models\User;

trait AuthenticatedUsers
{
    public function authenticateUser($isAdmin = false)
{
    $user = User::factory()->create();
    
    if ($isAdmin) {
        $user->assignRole('admin');  // Si tienes roles, puedes asignarlos aquí
    }

    $this->actingAs($user);
    return $user;
}
}
