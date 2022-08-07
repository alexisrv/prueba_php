<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Commune;
use App\Models\Region;
use Carbon\Carbon;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;
use LogActivity;
use Illuminate\Http\Request; 

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::select('customers.name', 'customers.last_name', 'customers.address','regions.description', 'communes.description')
            ->join('regions', 'customers.fk_reg', '=', 'regions.id_reg')
            ->join('communes', 'customers.fk_com', '=', 'communes.id_com')
            ->where('customers.status','!=', 'trash')
            ->get();
        \LogActivity::addToLog('Customers requested');
        return response()->json(['status' => true, 'data' => $customers]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $datetime = Carbon::now();
        $customer = Customer::create([
            'dni' => $request->dni,
            'fk_reg' => $request->region,
            'fk_com' => $request->commune,
            'email' => $request->email,
            'name' => $request->name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'date_reg' => $datetime
        ]);
        \LogActivity::addToLog('New customer added');
        return response()->json(['status' => true, 'data' => $customer]);
    }

    public function show($id)
    {
        $customer = Customer::select('customers.name', 'customers.last_name', 'customers.address','regions.description', 'communes.description')
            ->join('regions', 'customers.fk_reg', '=', 'regions.id_reg')
            ->join('communes', 'customers.fk_com', '=', 'communes.id_com')
            ->where('customers.status', 'A')
            ->where(function ($query) use ($id){
                $query->where('customers.dni', '=',$id)
                      ->orWhere('customers.email','=', $id);
            })
            ->get();
        \LogActivity::addToLog('Customers requested');
        return response()->json(['status' => true, 'data' => $customer]);
    }

    public function edit(Customer $customer)
    {
        //
    }

    public function update(Request $request, Customer $customer)
    {
        //
    }

    public function destroy(Request $request)
    {
        $customer = Customer::find($request->id);
        if($customer['status'] == 'A' || $customer['status'] == 'I'){
            Customer::find($request->id)->update(['status' => 'trash']);
            \LogActivity::addToLog('Customers deleted successfully');
            return response()->json(['status' => true, 'message' => "Customer deleted successfully"]);
        }elseif($customer['status'] == 'trash'){
            \LogActivity::addToLog("Customer doesn't exist");
            return response()->json(['status' => false, 'message' => "Customer doesn't exist"]);
        }
    }
}
