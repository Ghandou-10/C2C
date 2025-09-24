<?php

namespace Modules\Accounts\Tests\Feature\Dashboard;

use Modules\Accounts\Entities\Customer;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CustomerFilterTest extends TestCase
{

    #[Test]
    public function it_can_filter_customers_by_name()
    {
        $this->actingAsAdmin();

        Customer::factory()->create(['name' => 'Ahmed']);

        Customer::factory()->create(['name' => 'Mohamed']);

        $this->get(route('dashboard.customers.index', [
            'name' => 'ahmed',
        ]))
            ->assertSuccessful()
            ->assertSee('Ahmed')
            ->assertDontSee('Mohamed');
    }

    #[Test]
    public function it_can_filter_customers_by_email()
    {
        $this->actingAsAdmin();

        Customer::factory()->create([
            'name'  => 'User 1',
            'email' => 'user1@demo.com',
        ]);

        Customer::factory()->create([
            'name'  => 'User 2',
            'email' => 'user2@demo.com',
        ]);

        $this->get(route('dashboard.customers.index', [
            'email' => 'user1@',
        ]))
            ->assertSuccessful()
            ->assertSee('User 1')
            ->assertDontSee('User 2');
    }

    #[Test]
    public function it_can_filter_customers_by_phone()
    {
        $this->actingAsAdmin();

        Customer::factory()->create([
            'name'  => 'User 1',
            'phone' => '123',
        ]);

        Customer::factory()->create([
            'name'  => 'User 2',
            'email' => '456',
        ]);

        $this->get(route('dashboard.customers.index', [
            'phone' => '123',
        ]))
            ->assertSuccessful()
            ->assertSee('User 1')
            ->assertDontSee('User 2');
    }
}
