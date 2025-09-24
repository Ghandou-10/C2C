<?php

namespace Modules\Accounts\Tests\Feature\Api;

use Modules\Accounts\Entities\Customer;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class LoginTest extends TestCase
{

    #[Test]
    public function login_validation()
    {
        $this->postJson(route('user.login'), [])
            ->assertSee('data')
            ->assertJsonStructure([
                'data',
                'success',
                'message'
            ]);

        $this->postJson(route('user.login'), [
            'username' => 'user@demo.com',
            'password' => 'password',
        ])->assertSee('success')
            ->assertJsonStructure([
                'message',
                'success'
            ]);
    }

    #[Test]
    public function user_login()
    {
        $user = Customer::factory()->create();

        $response = $this->postJson(route('user.login'), [
            'username'    => $user->email,
            'password'    => 'password',
            'device_name' => 'testing',
        ]);

        $response->assertSuccessful()
            ->assertSee('data')
            ->assertJsonStructure([
                'data',
                'message',
                'success'
            ]);

        $response = $this->postJson(route('user.login'), [
            'username'    => $user->phone,
            'password'    => 'password',
            'device_name' => 'testing',
        ]);

        $response->assertSuccessful()
            ->assertSee('data')
            ->assertJsonStructure([
                'data',
                'message',
                'success'
            ]);
    }

    protected function setUp(): void
    {
        parent::setUp();
        // set your headers here
        $this->withHeaders([
            'Accept' => 'application/json'
        ]);

    }
}
