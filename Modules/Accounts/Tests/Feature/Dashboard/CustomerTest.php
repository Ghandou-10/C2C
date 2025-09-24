<?php

namespace Modules\Accounts\Tests\Feature\Dashboard;

use App\Http\Middleware\VerifyCsrfToken;
use Modules\Accounts\Entities\Customer;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CustomerTest extends TestCase
{

    #[Test]
    public function it_can_display_list_of_customers()
    {
        $this->actingAsAdmin();

        $customer = Customer::factory()->create();

        $response = $this->get(route('dashboard.customers.index'));

        $response->assertSuccessful();

        $response->assertSee(e($customer->name));
    }

    #[Test]
    public function it_can_display_customer_details()
    {
        $this->actingAsAdmin();

        $customer = Customer::factory()->create();

        $response = $this->get(route('dashboard.customers.show', $customer));

        $response->assertSuccessful();

        $response->assertSee(e($customer->name));
    }

    #[Test]
    public function it_can_display_customer_create_form()
    {
        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.customers.create'));

        $response->assertSuccessful();

        $response->assertSee(trans('accounts::customers.actions.create'));
    }

    #[Test]
    public function it_can_create_customers()
    {
        $this->withoutMiddleware(VerifyCsrfToken::class); // remove if test fails
        $this->actingAsAdmin();

        $customersCount = Customer::count();

        $response = $this->postJson(
            route('dashboard.customers.store'),
            [
                'name'                  => 'Customer',
                'email'                 => 'customer@demo.com',
                'phone'                 => '+201156382043',
                'password'              => 'password',
                'password_confirmation' => 'password',
            ]
        );

        $response->assertRedirect();

        $this->assertEquals(Customer::count(), $customersCount + 1);
    }

    #[Test]
    public function it_can_display_customer_edit_form()
    {
        $this->actingAsAdmin();

        $customer = Customer::factory()->create();

        $response = $this->get(route('dashboard.customers.edit', $customer));

        $response->assertSuccessful();

        $response->assertSee(trans('accounts::customers.actions.edit'));
    }

    #[Test]
    public function it_can_update_customers()
    {
        $this->withoutMiddleware(VerifyCsrfToken::class); // remove if test fails
        $this->actingAsAdmin();

        $customer = Customer::factory()->create();

        $response = $this->put(
            route('dashboard.customers.update', $customer),
            [
                'name'                  => 'Customer',
                'email'                 => 'customer@demo.com',
                'phone'                 => '+201156382043',
                'password'              => 'password',
                'password_confirmation' => 'password',
            ]
        );

        $response->assertRedirect();

        $customer->refresh();

        $this->assertEquals($customer->name, 'Customer');
    }

    #[Test]
    public function it_can_delete_customer()
    {
        $this->withoutMiddleware(VerifyCsrfToken::class); // remove if test fails
        $this->actingAsAdmin();

        $customer = Customer::factory()->create();

        $customersCount = Customer::count();

        $response = $this->delete(route('dashboard.customers.destroy', $customer));
        $response->assertRedirect();

        $this->assertEquals(Customer::count(), $customersCount - 1);
    }
}
