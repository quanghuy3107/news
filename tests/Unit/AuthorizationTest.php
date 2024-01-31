<?php

namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class AuthorizationTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testAdminCanAccessResource(): void
    {
        $users = new User();
        $user = $this->users->roles()->pluck('RoleCode');

        $response = $this->actingAs($user)->get('/admin/resource');

        $response->assertStatus(200);
    }
}
