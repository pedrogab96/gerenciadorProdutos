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

    /**
     * Create a new customer
     * @group Customer
     * @bodyParam name string required The name of the customer.
     * @bodyParam email string required The email of the customer.
     * @bodyParam telephone string required The phone of the customer.
     * @bodyParam address string required The address of the customer.
     * @responseFile responses/customer/create.json
     */
    public function create(CreateCustomerRequest $request)
    {
        $request->validated();
        $data = $request->except('_token', '_method');
        $customer = $this->customerService->create($data);
        return response()->json($customer, 201);
    }
}
