<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use Auth;

class PlaceController extends Controller
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
        $places = Place::all();
        return view('admin.places.index',compact('places'))
        ->with('i', 0);
    }

    /**
     * Display a form for resource creatione.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.places.create');
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
            'name' => 'required',
        ]);

        $request->offsetSet('customer_id', Auth::user()->customer_id);

        Place::create($request->all());

        return redirect()->route('places.index')
                        ->with('success','Lugar creado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $place = Place::with('sensors')->find($id);
        return view('admin.places.show', compact('place'))
        ->with('i', 0);
    }

    /**
     * Display the resource edit form.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        return view('admin.places.edit',compact('place'));
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
        $place = Place::find($id)->update($request->all());
        return redirect()->route('places.index')
                        ->with('success','Lugar  actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Place::find($id)->delete();
        return response(array(
                'message' =>'Place deleted successfully',
               ),200);
    }
}
