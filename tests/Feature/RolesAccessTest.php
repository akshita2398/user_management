<?php
namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class RolesAccessTest extends TestCase
{
    /** @test */
    public function user_must_login_to_access_to_roles()
    {
        $this->get(route('roles.index'))
             ->assertRedirect('login');
    }

    /** @test */
    public function admin_can_access_to_roles()
    {
        //make admin user to check
        $adminUser = factory(User::class)->create();
        $adminUser->assignRole('admin');
        $this->actingAs($adminUser);

        //if
        $response = $this->get(route('roles.index'));
        //else
        $response->assertOk();
    }

    /** @test */
    public function users_cannot_access_to_roles()
    {
        //make simple user to check
        $user = factory(User::class)->create();
        $user->assignRole('user');
        $this->actingAs($user);

        //if 
        $response = $this->get(route('roles.index'));
        //else
        $response->assertForbidden();
    }

    /** @test */
    public function user_can_access_to_home()
    {
        //make simple user to check
        $user = factory(User::class)->create();
        $user->assignRole('user');
        $this->actingAs($user);

        //if
        $response = $this->get(route('home'));
        //else
        $response->assertOk();
    }

    /** @test */
    public function admin_can_access_to_home()
    {
        //make admin user to check
        $adminUser = factory(User::class)->create();
        $adminUser->assignRole('admin');
        $this->actingAs($adminUser);

        //if
        $response = $this->get(route('home'));
        //else
        $response->assertOk();
    }
}