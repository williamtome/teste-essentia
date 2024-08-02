<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use App\Services\ImageService;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create(): View
    {
        return view('customers.create');
    }

    public function store(CustomerRequest $request): View
    {
        $imageUrl = (new ImageService())->upload($request->file('avatar'));

        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image_url' => $imageUrl,
        ]);

        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    public function edit(Customer $customer): View
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(CustomerRequest $request, Customer $customer): View
    {
        $imageUrl = (new ImageService())->upload($request->file('avatar'));

        if (!is_null($imageUrl)) {
            $customer->image_url = $imageUrl;
        }

        $customer->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);


        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    public function destroy(Customer $customer): View
    {
        $customer->delete();

        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }
}
