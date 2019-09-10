<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    public function test_only_logged_in_users_can_see_the_admin()
    {
        $response = $this->get('/admin/customers')
            ->assertRedirect('/login');
    }
}
