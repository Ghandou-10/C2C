<?php

namespace Modules\Accounts\Tests\Feature\Api;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    #[Test]
    public function register_validation()
    {
        $this->postJson(route('user.register'), [])
            ->assertSee('data')
            ->assertJsonStructure([
                'data' => [
                    'name',
                    'phone',
                ]
            ]);

        $this->postJson(route('user.register'), [
            'name'                  => 'User',
            'email'                 => 'user.demo.com',
            'phone'                 => '123456',
            'password'              => 'password',
            'password_confirmation' => '123456',
        ])->assertSuccessful()
            ->assertSee('data')
            ->assertJsonStructure([
                'data',
                'message',
                'success'
            ]);
    }

    //    #[Test]
    //    public function register()
    //    {
    //        Event::fake();
    //
    //        $response = $this->postJson(route('user.register'), [
    //            'name' => 'User',
    //            'email' => 'user@demo.com',
    //            'phone' => '123456',
    //            'password' => 'password',
    //            'type' => User::CUSTOMER_TYPE,
    //        ]);
    //
    //        $response->assertSuccessful()
    //            ->assertSee('data')
    //            ->assertJsonStructure([
    //                'data',
    //                'message',
    //                'success'
    //            ]);
    //
    //        $user = User::all()->last();
    //
    //        $this->assertEquals($user->name, 'User');
    //
    //        Event::assertDispatched(VerificationCreated::class);
    //
    //    }
}
