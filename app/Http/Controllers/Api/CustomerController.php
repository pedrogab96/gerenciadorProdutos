<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Services\CustomerService;

class CustomerController extends Controller
{

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $customer = $this->customerService->create($data);
        return response()->json($customer, 201);
    }
}
