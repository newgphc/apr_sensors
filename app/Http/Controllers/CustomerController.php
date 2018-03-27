<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\User;
use Hash;

class CustomerController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customers.index',compact('customers'))
        ->with('i', 0);
    }

    /**
     * Display a form for resource creatione.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create')
        //enables password input at create form
        ->with('isCreate', true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      request()->validate([
            'rut' => 'required',
            'name' => 'required',
            'mail' => 'required',
            'address' => 'required',
            'phone_1' => 'required'
        ]);

        $customer = Customer::create($request->all());

        // Hash password before save
        if (!empty($request->password)) {
            $request->offsetSet('password', Hash::make($request->password));
        }

        User::create(
                      [
                        'email' => $request->mail,
                        'name' => $request->name,
                        'password' => $request->password,
                        'customer_id' => $customer->id
                      ]);

        return redirect()->route('customers.index')
                        ->with('success','Cliente creado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);
        return response($customer,200);
    }

    /**
     * Display the resource edit form.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
              'rut' => 'required',
              'name' => 'required',
              'mail' => 'required',
              'address' => 'required',
              'phone_1' => 'required'
          ]);
          $customer = Customer::find($id)->update($request->all());
          return redirect()->route('customers.index')
                          ->with('success','Cliente actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id)->delete();
        return response(array(
                'message' =>'Customer deleted successfully',
               ),200);
    }
}
