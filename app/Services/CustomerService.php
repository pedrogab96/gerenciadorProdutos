<?php

namespace App\Services;

use App\Models\Customer;

class CustomerService
{
    public function getAllCustomers()
    {
        return Customer::all();
    }

    public function create(array $data)
    {
        return Customer::create($data);
    }

    public function update($id, array $data)
    {
        $customer = Customer::find($id);
        $customer->update($data);
        return $customer;
    }
}
