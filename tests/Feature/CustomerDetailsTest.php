<?php

namespace Tests\Feature;

use App\Models\Customer;
use Livewire\Livewire;
use Tests\TestCase;

class CustomerDetailsTest extends TestCase
{

    protected Customer $customer1;
    protected Customer $customer2;

    function setUp(): void
    {
        parent::setUp();
        $this->customer1 = Customer::factory()->create([
            'name' => '%customer0',
            'email' => 'matt@test.ca',
            'homePhone' => '11111111111',
            'mobilePhone' => '22222222222',
        ]);
        $this->customer2 = Customer::factory()->create([
            'name' => '%customer1',
            'email' => 'megan@test.ca',
            'homePhone' => '33333333333',
            'mobilePhone' => '44444444444',
        ]);
    }

    /** @test */
    function itFindsCorrectCustomerByName()
    {
        //Given two unique customers

        //When we search their name
        //Then we see them and no other
        Livewire::test("customer-details")
            ->set("customer_search_string", '%customer0')
            ->assertSeeText(["%customer0"])
            ->assertDontSeeText(["%customer1"]);
    }

    /** @test */
    function itFindsCorrectCustomerByEmail()
    {
        //Given our first customer
        //When we search their email
        //Then we see them and no other
        Livewire::test("customer-details")
            ->set("customer_search_string", 'matt@test.ca')
            ->assertSeeText(["%customer0"])
            ->assertDontSeeText(["%customer1"]);
    }

    /** @test */
    function itFindsCorrectCustomerByID()
    {
        //Given our first customer
        //When we search their ID
        //Then we see them and no other
        Livewire::test("customer-details")
            ->set("customer_search_string", '1')
            ->assertSeeText(["%customer0"])
            ->assertDontSeeText(["%customer2"]);
    }

    /** @test */
    function itFindsCorrectCustomerByHomePhone()
    {
        //Given our first customer
        //When we search their home phone
        //Then we see them and no other
        Livewire::test("customer-details")
            ->set("customer_search_string", '11111111111')
            ->assertSeeText(["%customer0"])
            ->assertDontSeeText(["%customer1"]);
    }

    /** @test */
    function itFindsCorrectCustomerByMobilePhone()
    {
        //Given our first customer
        //When we search their mobile phone
        //Then we see them and no other
        Livewire::test("customer-details")
            ->set("customer_search_string", '22222222222')
            ->assertSeeText(["%customer0"])
            ->assertDontSeeText(["%customer1"]);
    }

    /** @test */
    function itLoadsCustomerDataCorrectlyWhenSelected()
    {
        //Given a customer
        //When we select them
        //Then we see their data
        Livewire::test("customer-details")
            ->assertNotSet('current_customer.name', '%customer0')
            ->assertNotSet('current_customer.homePhone', '11111111111')
            ->assertNotSet('current_customer.mobilePhone', '22222222222')
            ->call("set_customer", $this->customer1->id)
            ->assertSet('current_customer.name', '%customer0')
            ->assertSet('current_customer.homePhone', '11111111111')
            ->assertSet('current_customer.mobilePhone', '22222222222');
    }

    /** @test */
    function itUpdatesTheCustomer()
    {
        //Given a customer
        //When we update their data
        //Then we see the updated data
        Livewire::test("customer-details")
            ->call("set_customer", $this->customer1->id)
            ->set("customer_name", "new name")
            ->set("customer_email", "test@test.ca")
            ->set("customer_home_phone", "55555555555")
            ->set("customer_mobile_phone", "66666666666")
            ->call("update_customer")
            ->assertSet('current_customer.name', 'new name')
            ->assertSet('current_customer.email', 'test@test.ca')
            ->assertSet('current_customer.homePhone', '55555555555')
            ->assertSet('current_customer.mobilePhone', '66666666666');

        //Double check the model
        $this->assertEquals(
            'new name',
            $this->customer1->fresh()->name
        );
        $this->assertEquals(
            'test@test.ca',
            $this->customer1->fresh()->email
        );
        $this->assertEquals(
            '55555555555',
            $this->customer1->fresh()->homePhone
        );
        $this->assertEquals(
            '66666666666',
            $this->customer1->fresh()->mobilePhone
        );
    }

    /** @test */
    function itThrowsErrorWhenEmailIsDuplicated()
    {
        //Given a customer
        //When we update their data to have a duplicate email
        //Then we see the error
        Livewire::test("customer-details")
            ->assertHasNoErrors('customer_email')
            ->call("set_customer", $this->customer1->id)
            ->set("customer_email", "megan@test.ca")
            ->call("update_customer")
            ->assertHasErrors('customer_email');
    }
}