<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller{

    public function index(){
        $customer = Customer::paginate(10);
        return response()->json([
            'data' => $customer
        ]);
    }

    public function store(Request $request){
        $customer = Customer::create([
            'name' => $request->name,
            'dob' => $request->dob,
            'email' => $request->email
        ]);
        return response()->json([
            'data' => $customer
        ]);
    }

    public function show(Customer $customer){
        return response()->json([
            'data' => $customer
        ]);
    }

    public function update(Request $request, Customer $customer){
        $customer->name = $request->name;
        $customer->dob = $request->dob;
        $customer->email = $request->email;
        $customer->save();

        return response()->json([
            'data' => $customer
        ]);
    }

    public function destroy(Customer $customer){
        $customer->delete();
        return response()->json([
            'message' => 'Customer Deleted'
        ],204);
    }
}
