<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCustomerRequest;
use App\Services\CustomerService;
use GuzzleHttp\Promise\Create;

class CustomerController extends Controller
{

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function create(CreateCustomerRequest $request)
    {
        $request->validated();
        $data = $request->except('_token', '_method');
        $customer = $this->customerService->create($data);
        return response()->json($customer, 201);
    }
}
