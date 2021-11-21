<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(CustomerService $customerService)
    {
        $customers = $customerService->getAllCustomers();
        return view('admin.customer.index')
            ->with('customers', $customers);
    }
}
