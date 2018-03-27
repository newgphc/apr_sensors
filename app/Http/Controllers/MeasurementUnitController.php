<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeasurementUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return MeasurementUnit::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $measurementUnit = MeasurementUnit::create($request->all());
 
        return response()->json($measurementUnit, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $measurementUnit = MeasurementUnit::find($id);
        return response($measurementUnit,200);
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
        MeasurementUnit::find($id)->update($request->all());
        return response(array(
                'message' =>'MeasurementUnit updated successfully',
               ),200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MeasurementUnit::find($id)->delete();
        return response(array(
                'message' =>'MeasurementUnit deleted successfully',
               ),200);
    }
}
