<?php

namespace App\Livewire;

use App\Models\Customer;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class CustomerDetails extends Component
{
    public ?Customer $current_customer;
    public Collection $customers;
    public bool $customer_updated = false;
    public string $customer_search_string = "";
    public string $customer_name = "";
    public string $customer_email = "";
    public string $customer_home_phone = "";
    public string $customer_mobile_phone = "";


    public function mount(): void
    {
        $this->customers = Collection::empty();
    }

    public function render(): View
    {
        $this->customers = $this->customer_search();

        return view('livewire.customer-details');
    }

    private function customer_search(): Collection
    {
        if ($this->customer_search_string === "") return new Collection([]);
        $query = Customer::where('id', $this->customer_search_string);
        $query = $query->orWhere('name', 'like', '%' . $this->customer_search_string . "%");
        $query = $query->orWhere('email', 'like', '%' . $this->customer_search_string . "%");
        $query = $query->orWhere('homePhone', 'like', '%' . $this->customer_search_string . "%");
        $query = $query->orWhere('mobilePhone', 'like', '%' . $this->customer_search_string . "%");
        return $query->limit(10)->get(['id', 'name']);
    }

    public function set_customer($id): void
    {
        $this->current_customer = Customer::where('id', $id)->first();
        $this->customer_search_string = "";
    }

    public function update_customer(): void
    {
        $this->customer_updated = false;
        if ($this->current_customer === null) return;
        if ($this->customer_email === "" && $this->customer_name === "" && $this->customer_home_phone === "" && $this->customer_mobile_phone === "") return;

        if ($this->customer_email !== "") $this->current_customer->email = $this->customer_email;
        if ($this->customer_name !== "") $this->current_customer->name = $this->customer_name;
        if ($this->customer_home_phone !== "") $this->current_customer->homePhone = $this->customer_home_phone;
        if ($this->customer_mobile_phone !== "") $this->current_customer->mobilePhone = $this->customer_mobile_phone;
        try {
            $this->current_customer->save();
            $this->resetErrorBag();
        } catch (\Exception $e) {
            $this->addError('customer_email', "Email already exists");
            return;
        };
        $this->customer_updated = true;
    }
}
