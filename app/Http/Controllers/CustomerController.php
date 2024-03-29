<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;
use App\Filters\CustomerFilter;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $filter = new CustomerFilter();
        $queryItems = $filter->transform($request);
        $includeInvoices = $request->query('includeInvoices');
        $customers = Customer::where($queryItems);
        if ($includeInvoices){
            $customers =$customers->with('invoices');
        }
        return new CustomerCollection($customers->paginate()->appends($request->query()));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 
     * This method is used to store a new customer in the database.
     * The StoreCustomerRequest class is used to validate the incoming request.
     * If the request is valid, the new customer is created and returned as a resource.
     * 
     */
    public function store(StoreCustomerRequest $request)
    {
        //
        return new CustomerResource(Customer::create($request->all()));
    }

    /**
     * Display the specified resource.
     * se utiliza loadmissing para cargar los datos faltantes
     * El query string includeInvoices se utiliza para cargar
     * las facturas asociadas con el cliente.
     */
    public function show(Customer $customer)
    {
        //
        $includeInvoices = request()->query('includeInvoices');
        if ($includeInvoices){
            return new CustomerResource($customer->loadMissing('invoices'));
        }
        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * se actualiza el cliente con los datos del request
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
        @$customer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
