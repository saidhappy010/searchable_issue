<?php

namespace Tests\Feature;

use App\Enums\Role;
use App\Models\City;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    public function test_city_field_is_required_when_creating_a_dass_admin_user()
    {
        $response = $this->post(
            route('admin.users.store'),
            User::factory()->raw([
                'role' => Role::DASS_ADMIN->value
            ])
        );

        $response->assertSessionHasErrors(['city']);
    }

    public function test_phone_field_must_matches_algerian_operators_format()
    {
        $response = $this->post(
            route('admin.users.store'),
            User::factory()->raw([
                'phone' => '0377777777',
                'role' => Role::SUPER_ADMIN->value,
            ])
        );

        $response->assertSessionHasErrors(['phone']);
    }

    public function test_role_field_must_be_valid()
    {
        $response = $this->post(
            route('admin.users.store'),
            User::factory()->raw([
                'role' => "Invalid",
            ])
        );

        $response->assertSessionHasErrors(['role']);
    }

    public function test_user_can_be_created()
    {
        $data = User::factory()->raw([
            'role' => Role::SUPER_ADMIN->value,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response = $this->post(route('admin.users.store'), $data);

        $response->assertOk();

        $this->assertEquals(1, User::where('username', $data['username'])->count());
    }

    public function test_super_admin_role_can_be_assigned_on_user_creation()
    {
        $data = User::factory()->raw([
            'role' => Role::SUPER_ADMIN->value,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response = $this->post(route('admin.users.store'), $data);

        $response->assertOk();

        $user = User::where('username', $data['username'])->first();

        $this->assertTrue($user->getRoleNames()->contains($data['role']));
    }

    public function test_central_admin_role_can_be_assigned_on_user_creation()
    {
        $data = User::factory()->raw([
            'role' => Role::CENTRAL_ADMIN->value,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response = $this->post(route('admin.users.store'), $data);

        $response->assertOk();

        $user = User::where('username', $data['username'])->first();

        $this->assertTrue($user->getRoleNames()->contains($data['role']));
    }

    public function test_city_field_in_required_on_dass_admin_user_creation()
    {
        $data = User::factory()->raw([
            'role' => Role::DASS_ADMIN->value,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response = $this->post(route('admin.users.store'), $data);

        $response->assertSessionHasErrors(['city']);
    }

    public function test_city_can_be_associated_on_dass_admin_user_creation()
    {
        $city = City::where('code', '16')->first();

        $data = User::factory()->raw([
            'password' => 'password',
            'password_confirmation' => 'password',
            'role' => Role::DASS_ADMIN->value,
            'city' => $city->code,
        ]);

        $response = $this->post(route('admin.users.store'), $data);

        $response->assertOk();

        $user = User::where('username', $data['username'])->first();

        $this->assertEquals($city->code, $user->city->code);
    }

    public function test_dass_admin_role_can_be_assigned_on_user_creation()
    {
        $city = City::where('code', '16')->first();

        $data = User::factory()->raw([
            'password' => 'password',
            'password_confirmation' => 'password',
            'role' => Role::DASS_ADMIN->value,
            'city' => $city->code,
        ]);

        $response = $this->post(route('admin.users.store'), $data);

        $response->assertOk();

        $user = User::where('username', $data['username'])->first();

        $this->assertTrue($user->getRoleNames()->contains($data['role']));
    }
}
